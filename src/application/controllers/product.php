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

    function __call($productID, $args)
    {
        $this->details($productID);
    }

    protected function extractSlugFromURL()
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], "\/\\"));
        return array_pop($uri);
    }

    function details($productID)
    {
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountPin()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->filterID($productID);

        $mapper->getQuery()->select('seller.name as seller_name, seller.logo AS seller_logo, seller.logo_bg_color')->innerJoin('t_seller as seller', 'seller.id = p.fk_seller');
        $product = $mapper->find(function($rawData, $instance)
        {
            if ($instance->id)
            {
                $instance->seller_name = $rawData['seller_name'];
                $instance->seller_logo = $rawData['seller_logo'];
                $instance->logoBgColor = $rawData['logo_bg_color'];
            }
        });

        if ($product->id)
        {
            if ($product->friendlyName != $this->extractSlugFromURL())
            {
                header('location:' . $product->getURL());
                die;
            }
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
            $view = LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                    ->setTitle($product->getName())
                    ->setCss(array(
                        '/style/details.css',
                        '/plugins/jqzoom_ev-2.3/css/jquery.jqzoom.css'
                    ))
                    ->setJavascript(array(
                        '/plugins/jqzoom_ev-2.3/js/jquery.jqzoom-core.js',
                        '/js/controller/productDetailsCtrl.js'
                    ))
                    ->setData($data, true);

            /* @var $product ProductFixedDomain */
            if ((string) $product->getMetaKeywords())
            {
                $view->addMeta('<meta name="keywords" content="' . $product->getMetaKeywords() . '"/>');
            }
            if ((string) $product->getMetaDescription())
            {
                $view->addMeta('<meta name="description" content="' . $product->getMetaDescription() . '"/>');
            }

            $view->render('product/details');
        }
        else
        {
            header("HTTP/1.1 410 Gone");
            LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                    ->setTitle('Product not found')
                    ->render('product/not_found');
        }
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
                ->where("p.id <> $productID")
                ->limit(9);
        $products = $mapper->findAll(function($record, ProductFixedDomain $instance)
        {
            $instance->seller_name = $record['seller_name'];
        });
        $json = array();
        foreach ($products as $product)
        {
            /* @var $product ProductFixedDomain */
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = strval($product->getName());
            $obj['thumbnail'] = $images ? strval($images[0]->url) : '';
            $obj['priceString'] = strval($product->getPriceMoney(User::getCurrentUser()->getCurrency()));
            $obj['url'] = $product->getURL();
            $obj['priceOrigin'] = (string) $product->getPriceOrigin(User::getCurrentUser()->getCurrency());
            $json[] = $obj;
        }
        return $json;
    }

}
