<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends BaseController
{

    /** @var ProductModel */
    public $productModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/ProductModel', 'productModel');
    }

    function details($productID)
    {
        //query product
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountPin()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->filterID($productID);
        $mapper->getQuery()->select('seller.name as seller_name, seller.logo AS seller_logo')->innerJoin('t_seller as seller', 'seller.id = p.fk_seller');
        $product = $mapper->find(function($rawData, $instance)
        {
            $instance->seller_name = $rawData['seller_name'];
            $instance->seller_logo = $rawData['seller_logo'];
        });
        $this->productModel->addtoViewList($productID);
        $user = User::getCurrentUser();
        //query ancestor cates
        $parentCategory = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($product->fkCategory)->find();
        $ancestors = explode('/', trim($parentCategory->path, '/'));
        $breadcrums = array();
        foreach ($ancestors as $cateID)
        {
            if ($cateID == $parentCategory->id)
            {
                continue;
            }
            $ancestor = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($cateID)->find();
            $breadcrums[$ancestor->name] = $ancestor->getURL();
        }

        $breadcrums[$parentCategory->name] = $parentCategory->getURL();
        $productName = strlen(strval($product->getName())) > 50 ? mb_substr((string) $product->getName(), 0, 50, 'UTF-8') . '...' : (string) $product->getName();
        $breadcrums[$productName] = NULL;

        $data = array(
            'product'    => $product,
            'breadcrums' => $breadcrums,
            'ancestors'  => $ancestors
        );
        $data['secondLvlCates'] = CategoryMapper::make()->setLanguage($user->languageKey)->filterParent($ancestors[0])->findAll();
        $data['relatedProducts'] = $this->_get_related_products($product->id);
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setCss(array(
                    '/style/details.css',
                    '/plugins/jqzoom_ev-2.3/css/jquery.jqzoom.css'
                ))
                ->setJavascript(array(
                    '/plugins/jqzoom_ev-2.3/js/jquery.jqzoom-core.js',
                    '/js/controller/productDetailsCtrl.js'
                ))
                ->setData($data, true)
                ->render('product/details');
    }

    function _get_related_products($productID)
    {
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->autoloadAttributes()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterRelatedProduct($productID);
        $mapper->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'p.fk_seller = seller.id')
                ->limit(9);
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
            $obj['priceString'] = strval($product->getPriceMoney(User::getCurrentUser()->getCurrency()));
            $obj['url'] = base_url('product/details') . '/' . $product->id;
            $json[] = $obj;
        }
        return $json;
    }

}
