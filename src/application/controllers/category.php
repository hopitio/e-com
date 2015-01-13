<?php

defined('BASEPATH') or die('no direct script access allowed');

class category extends BaseController
{

    /** @var CategoryModel */
    public $categoryModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/CategoryModel', 'categoryModel');
    }

    protected function extractSlugFromURL()
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], "\/\\"));
        return array_pop($uri);
    }

    function __call($cate_code, $args)
    {
        $cate_id = DB::getInstance()->GetOne("SELECT id FROM t_category WHERE codename=?", array($cate_code));
        if (!$cate_id)
        {
            throw new Lynx_RoutingException;
        }
        $this->show($cate_id);
    }

    function categories_service($parent = NULL)
    {
        $categories = CategoryMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterParent($parent)
                ->findAll();
        $json = array();
        foreach ($categories as $cate)
        {
            $cate->url = Common::language_url('category/show/' . $cate->id);
            $json[] = $cate;
        }
        header('content-type: application/json');
        echo json_encode($json);
    }

    function show($id)
    {

        $user = User::getCurrentUser();
        $thisCate = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($id)->find();
        /* @var $thisCate CategoryDomain */
        $parentIDs = explode('/', trim($thisCate->path, '/'));
        $activeCates = array();
        foreach ($parentIDs as $parentID)
        {
            $activeCates[] = $parentID;
        }
        $data['thisCate'] = $thisCate;
        if ($thisCate->codename != $this->extractSlugFromURL())
        {
            header('location:' . $thisCate->getURL());
            exit;
        }
        $data['firstLvlCate'] = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($activeCates[0])->find();
        $data['secondLvlCates'] = CategoryMapper::make()->setLanguage($user->languageKey)->filterParent($activeCates[0])->findAll();

        if (Common::isCrawlers())
        {
            $this->show_for_crawler($id, $data);
            exit;
        }

        $view = LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl);
        call_user_func_array(array($view, 'setActiveCates'), $activeCates);
        $view->setData($data,false)
                ->setTitle($thisCate->name)
                ->setJavascript(array('/js/controller/CategoryListCtrl.js'))
                ->setCss(array('/style/category.css'))
                ->render('category/show');
    }

    function show_for_crawler($id, $data)
    {
        $data['products'] = array();
        if ($data['thisCate']->getLevel() == 2)
        {
            $data['products'] = ProductFixedMapper::make()
                    ->autoloadAttributes()
                    ->filterCategory($data['thisCate']->id)
                    ->filterStatus(1)
                    ->findAll();
        }
        $view = LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl);
        $view->setData($data,false)
                ->setTitle($data['thisCate']->name)
                ->render('category/show_for_crawler');
    }

    function productService($cateID)
    {
        header('Content-type: application/json');
        $offset = (int) $this->input->get('offset');
        $sort = $this->input->get('sort');
        $user = User::getCurrentUser();
        $category = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($cateID)->find();
        $priceLow = (double) $this->input->get('priceLow');
        $priceHigh = (double) $this->input->get('priceHigh');

        $priceLow = new Money($priceLow, new Currency(User::getCurrentUser()->getCurrency()));
        $priceHigh = new Money($priceHigh, new Currency(User::getCurrentUser()->getCurrency()));

        $priceLow = $priceLow->convert(new Currency('VND'))->getAmount();
        $priceHigh = $priceHigh->convert(new Currency('VND'))->getAmount();

        if ($category->getLevel() == 1)
        {
            $products = $this->categoryModel->getBestProduct($category, $offset, $sort, $priceLow, $priceHigh);
        }
        else
        {
            $products = $this->categoryModel->getProductByCategory($category, $offset, $sort, $priceLow, $priceHigh);
        }
        $json = array();
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getPriceMoney($user->getCurrency()));
            $obj['priceOrigin'] = $product->priceOrigin ? (string) $product->getPriceOrigin()->convert(new Currency($user->getCurrency())) : '';
            $obj['url'] = $product->getURL();
            $obj['isNew'] = $product->isNew();
            $obj['salesPercent'] = $product->getSalesPercent();
            $json[] = $obj;
        }
        echo json_encode($json);
    }

}
