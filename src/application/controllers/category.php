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
        $top_categories = $this->categoryModel->getAllTopLevelCategories($user->languageKey);
        $category = CategoryMapper::make()->select()->filterID($id)->setLanguage($user->languageKey)->find(function($rawData, $instance)
        {
            /* @var $instance CategoryDomain */
            $instance->dom_side_images = simplexml_load_string($rawData['side_images']);
            $instance->dom_slide_image = simplexml_load_string($rawData['slide_images']);
            $instance->dom_product_section_images = simplexml_load_string($rawData['product_section_image']);
        });
        $ancestors = explode('/', trim($category->path, '/'));
        $breadcrums = array('Home' => '/');
        $top_level_active = NULL;
        $sub_level_active = NULL;

        if ($category->isContainer)
        {
            $top_level_active = $category->id;
        }
        else
        {
            $top_level_active = $category->fkParent;
            $sub_level_active = $category->id;
        }
        $sub_menu = CategoryMapper::make()->filterParent($top_level_active)
                ->select()
                ->setLanguage($user->languageKey)
                ->findAll();

        foreach ($ancestors as $cateID)
        {
            if ($cateID == $category->id)
            {
                continue;
            }
            $ancestor = CategoryMapper::make()->select()->setLanguage($user->languageKey)->filterID($cateID)->find();
            $breadcrums[$ancestor->name] = $ancestor->getURL();
        }

        $breadcrums[$category->name] = $category->getURL();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData(array(
                    'category'         => $category,
                    'top_categories'   => $top_categories,
                    'breadcrums'       => $breadcrums,
                    'top_level_active' => $top_level_active,
                    'sub_level_active' => $sub_level_active,
                    'sub_menu'         => $sub_menu
                ))
                ->setJavascript(array('/js/controller/ListCtrl.js'))
                ->setCss(array('/style/list.css'))
                ->render('category/show');
    }

    function productService($cateID)
    {
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
                ->limit($this->input->get('limit'))
                ->offset($this->input->get('offset'));

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
            $obj['priceString'] = strval($product->getPriceMoney('VND'));
            $obj['url'] = '/product/details/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode(array('products' => $json, 'totalRecord' => $count));
    }

}
