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

        switch (User::getCurrentUser()->languageKey) {
            case 'VN-VI':
                $title = 'Trang chủ';
                break;
            case 'EN-US':
                $title = 'Home Page';
                break;
            case 'KO-KR':
                $title = '홈페이지';
                break;
        }

        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setTitle($title)
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
            $obj['salesPercent'] = $product->getSalesPercent();
            $obj['isNew'] = $product->isNew();
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
            $group->details = array(1 => array(), 2 => array());
            foreach ($group->getDetails() as $product)
            {
                if ($product->id)
                {
                    $images = $product->getImages('thumbnail');
                    $product->salesPercent = $product->getSalesPercent();
                    $product->name = strval($product->getName());
                    $product->thumbnail = $images[0]->url;
                    $product->priceString = strval($product->getFinalPriceMoney($user->getCurrency()));
                    $product->url = base_url('product/details') . '/' . $product->id;
                    $product->priceOrigin = $product->priceOrigin ? (string) $product->getPriceOrigin($user->getCurrency()) : '';
                    $product->isNew = $product->isNew();
                    $product->salesPercent = $product->getSalesPercent();
                }
                $group->details[$product->row][] = $product;
            }
        }
        echo json_encode($groups);
    }

    function new_service($offset)
    {
        header('content-type:application/json');
        $user = User::getCurrentUser();
        $limit = !$offset ? 12 : 8;
        $products = $this->product_model->getAllNewProduct($limit, (int) $offset);
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
            $obj['salesPercent'] = $product->getSalesPercent();
            $obj['isNew'] = $product->isNew();
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

    function remove_from_history($productID)
    {
        $this->product_model->removeFromHistory($productID);
    }
    
    function comingSoon(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setTitle("Comming soom")
        ->render('ComingSoon');
    }
    

}
