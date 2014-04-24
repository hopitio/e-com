<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends BaseController
{

    protected $authorization_required = FALSE;

    public function showHome()
    {
        //$this->load->model('Category');
        //$cate = $this->Category->loadCategory();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array(
                    '/js/controller/HomeCtrl.js'
                ))
                ->render('home');
        //LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData()->render('home');
    }

    function hot_service()
    {
        header('Content-type: application/json');
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->orderBySales()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->limit(4);
        $mapper
                ->select('seller.name AS seller_name')
                ->getQuery()
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
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
        
    }

}
