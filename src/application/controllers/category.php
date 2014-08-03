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

    function categories_service($parent = NULL)
    {
        $categories = CategoryMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterParent($parent)
                ->findAll();
        $json = array();
        foreach ($categories as $cate)
        {
            $cate->url = base_url('category/show/' . $cate->id);
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
        $data['secondLvlCates'] = CategoryMapper::make()->setLanguage($user->languageKey)->filterParent($activeCates[0])->findAll();

        $view = LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl);
        call_user_func_array(array($view, 'setActiveCates'), $activeCates);
        $view->setData($data)
                ->setJavascript(array('/js/controller/CategoryListCtrl.js'))
                ->setCss(array('/style/category.css'))
                ->render('category/show');
    }

    function productService($cateID)
    {
        header('Content-type: application/json');
        $offset = (int) $this->input->get('offset');
        $sort = $this->input->get('sort');
        $user = User::getCurrentUser();
        $category = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($cateID)->find();

        if ($category->getLevel() == 1)
        {
            $products = $this->categoryModel->getBestProduct($category, $offset);
        }
        else
        {
            $products = $this->categoryModel->getProductByCategory($category, $offset, $sort);
        }
        $json = array();
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getPriceMoney($user->getCurrency()));
            $obj['priceOrigin'] = $product->priceOrigin ? (string)$product->getPriceOrigin()->convert(new Currency($user->getCurrency())) : '';
            $obj['url'] = '/product/details/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode($json);
    }

}
