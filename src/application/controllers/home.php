<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends BaseController
{

    protected $authorization_required = FALSE;

    /** @var ProductModel */
    public $product_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/ProductModel', 'product_model');
    }

    public function showHome()
    {
        $data = array();
        $data['banners'] = Setting::getInstance()->get('home_banner');
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array(
                    '/js/controller/HomeCtrl.js'
                ))
                ->setCss(array('/style/home.css'))
                ->setData($data)
                ->render('home');
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
        $i = 0;
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images[0]->url;
            $obj['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
            $obj['url'] = base_url('product/details') . '/' . $product->id;
            $obj['priceOrigin'] = $product->priceOrigin ? (string) $product->getPriceOrigin($user->getCurrency()) : '';
            $obj['best'] = $i++ < 2 ? $i : false;
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function feature_group_service()
    {
        $user = User::getCurrentUser();
        $groups = FeatureGroupMapper::make()
                ->setLanguage($user->languageKey)
                ->setAutoloadProducts()
                ->findAll();
        foreach ($groups as $group)
        {
            foreach ($group->getProducts() as $product)
            {
                $images = $product->getImages('thumbnail');
                $product->name = strval($product->getName());
                $product->thumbnail = $images[0]->url;
                $product->priceString = strval($product->getFinalPriceMoney($user->getCurrency()));
                $product->url = base_url('product/details') . '/' . $product->id;
                $product->priceOrigin = $product->priceOrigin ? (string) $product->getPriceOrigin($user->getCurrency()) : '';
            }
            $group->images = $group->getImages();
            $group->products = $group->getProducts();
        }
        echo json_encode($groups);
    }

    function new_service($offset)
    {
        header('content-type:application/json');
        $user = User::getCurrentUser();
        $products = $this->product_model->getAllNewProduct(8, (int) $offset);
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
            $obj['priceOrigin'] = $product->priceOrigin ? (string) $product->getPriceOrigin()->convert(new Currency($user->getCurrency())) : '';
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function viewed_service()
    {
        header('content-type: application/json');
        $user = User::getCurrentUser();
        $products = $this->product_model->getViewedProducts();
        $json = array();
        foreach ($products as $product)
        {
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
            $obj['url'] = base_url('product/details') . '/' . $product->id;
            $obj['priceOrigin'] = $product->priceOrigin ? (string) $product->getPriceOrigin()->convert(new Currency($user->getCurrency())) : '';
            $json[] = $obj;
        }
        echo json_encode($json);
    }

}
