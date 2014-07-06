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
        $user = User::getCurrentUser();
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->autoloadTaxes()
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
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images[0]->url;
            $obj['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
            $obj['url'] = base_url('product/details') . '/' . $product->id;
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function new_service()
    {
        $user = User::getCurrentUser();
        $this->load->model('modelEx/ProductModel', 'product_model');
        $products = $this->product_model->getAllNewProduct();
        $json = array();

        /* @var $products ProductFixedDomain */
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
            $obj['url'] = base_url('product/details') . '/' . $product->id;
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
        $user = User::getCurrentUser();
        $categories = CategoryMapper::make()
                ->setLanguage($user->languageKey)
                ->filterShowInHome()
                ->findAll(function($rawData, $instance)
        {
            $instance->dom_product_section_images = simplexml_load_string($rawData['product_section_image']);
        });

        $json = array();
        foreach ($categories as $section)
        {
            $section_array = get_object_vars($section);
            $section_array['url'] = base_url("category/show/{$section->id}");
            if ($section->dom_product_section_images &&
                    isset($section->dom_product_section_images->img))
            {
                $attrs = $section->dom_product_section_images->img->attributes();
                $section_array['displayImage'] = (string) $attrs->src;
                $section_array['displayImageTitle'] = (string) $attrs->title;
                $section_array['displayImageHref'] = (string) $attrs->href;
            }
            $section_array['products'] = array();

            $productMapper = ProductFixedMapper::make()
                    ->select('p.*', true)
                    ->setLanguage($user->languageKey)
                    ->autoloadTaxes()
                    ->filterStatus(1)
                    ->autoloadAttributes();
            if (isset($section_array['displayImage']))
            {
                $productMapper->limit(6);
            }
            else
            {
                $productMapper->limit(8);
            }
            if ($section->isContainer)
            {
                $productMapper->filterContainerCategory($section->id);
            }
            else
            {
                $productMapper->filterCategory($section->id);
            }
            $productMapper->getQuery()
                    ->select('seller.name AS seller_name')
                    ->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
            $products = $productMapper->findAll(function($rawData, $instance)
            {
                $instance->seller_name = $rawData['seller_name'];
            });
            foreach ($products as $product)
            {
                $images = $product->getImages('thumbnail');
                $product_array = get_object_vars($product);
                $product_array['name'] = strval($product->getName());
                $product_array['thumbnail'] = $images ? strval($images[0]->url) : '';
                $product_array['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
                $product_array['url'] = base_url('product/details') . '/' . $product->id;

                $section_array['products'][] = $product_array;
            }
            $json[] = $section_array;
        }
        echo json_encode($json);
    }

}
