<?php

defined('BASEPATH') or die('no direct script access allowed');

class category extends BaseController
{

    /** @var CategoryModel */
    public $categoryModel;

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
        $this->load->model('modelEx/CategoryModel', 'categoryModel');
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
        $pageNo = (int) $this->input->get('page');
        if (!$pageNo)
        {
            $pageNo = 1;
        }
        header('Content-type: application/json');
        $user = User::getCurrentUser();
        $category = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($cateID)->find();
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->autoloadAttributes()
                ->setLanguage($user->languageKey);

        if ($category->isContainer)
        {
            $mapper->filterContainerCategory($category->id);
        }
        else
        {
            $mapper->filterCategory($category->id);
        }

        $mapper->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'p.fk_seller = seller.id')
                ->limit(20)
                ->offset(($pageNo - 1) * 20);

        switch (strval($this->input->get('sort'))) {
            case '':
            case 'new':
                $mapper->getQuery()->orderBy('p.date_created DESC');
                break;
            case 'priceasc':
                $mapper->orderByPrice();
                break;
            case 'pricedesc':
                $mapper->orderByPrice(true);
                break;
        }

        $count = $mapper->count();
        $products = $mapper->findAll(function($record, ProductFixedDomain $instance)
        {
            $instance->seller_name = $record['seller_name'];
        });


        $json = array();
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getPriceMoney($user->getCurrency()));
            $obj['url'] = '/product/details/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode(array('products' => $json, 'totalPage' => ceil($count / 20)));
    }

}
