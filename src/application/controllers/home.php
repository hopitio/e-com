<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends BaseController
{

    protected $authorization_required = FALSE;

    /** @var ProductModel */
    public $product_model;

    public function showHome()
    {
        //$this->load->model('Category');
        //$cate = $this->Category->loadCategory();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array(
                    '/js/controller/HomeCtrl.js'
                ))
                ->setCss(array('/style/home.css'))
                ->render('home');
        //LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData()->render('home');
    }

    function hot_service()
    {
        header('Content-type: application/json');
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes();
        $mapper
                ->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller')
                ->innerJoin('t_hot h', 'h.fk_product = p.id')
                ->orderBy('h.sort');
        $products = $mapper->findAll(function($record, ProductFixedDomain $domain)
        {
            $domain->seller_name = $record['seller_name'];
        });
        $json = array();

        /* @var $products ProductFixedDomain */
        foreach ($products as $product)
        {
            $images = $product->getImages();
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->getTrueValue()) : '';
            $obj['priceString'] = strval($product->getPriceString('USD'));
            $obj['url'] = site_url('product/details') . '/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function new_service()
    {
        $this->load->model('modelEx/ProductModel', 'product_model');
        $products = $this->product_model->getAllNewProduct();
        $json = array();

        /* @var $products ProductFixedDomain */
        foreach ($products as $product)
        {
            $images = $product->getImages();
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->getTrueValue()) : '';
            $obj['priceString'] = strval($product->getPriceString('USD'));
            $obj['url'] = site_url('product/details') . '/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function sale_service()
    {
        
    }

    function section_service()
    {
        header('Content-type: application/json');
        $sections = SectionMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadProducts()
                ->findAll();

        $json = array();
        foreach ($sections as $section)
        {
            $section_array = get_object_vars($section);
            $section_array['url'] = site_url("section/show/{$section->id}");
            $section_array['products'] = array();
            foreach ($section->getProducts() as $product)
            {
                $images = $product->getImages();
                $product_array = get_object_vars($product);
                $product_array['name'] = strval($product->getName());
                $product_array['thumbnail'] = $images ? strval($images[0]->getTrueValue()) : '';
                $product_array['priceString'] = strval($product->getPriceString('USD'));
                $product_array['url'] = site_url('product/details') . '/' . $product->id;

                $section_array['products'][] = $product_array;
            }
            $json[] = $section_array;
        }

        echo json_encode($json);
    }

}
