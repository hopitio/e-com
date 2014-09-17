<?php

defined('BASEPATH') or die('no direct script access allowed');

class search extends BaseController
{

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array(
                    '/js/controller/SearchCtrl.js'
                ))
                ->setCss(array('/style/customerList.css'))
                ->setJavascript(array('/js/controller/SearchCtrl.js'))
                ->setData(array(
                    'search_keywords' => $this->input->get('kw')
                ))
                ->render('search/show_page');
    }

    function getProductService()
    {
        header('Content-type:application/json');
        $user = User::getCurrentUser();
        $keywords = $this->input->get('kw');
        $limit = 20;
        $offset = (int) $this->input->get('offset');
        $mapper = SearchMapper::make()
                ->setLanguage($user->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->filterSearchKeywords($keywords);
        $mapper->getQuery()
                ->select('p.*, seller.name as seller_name', true)
                ->innerJoin('t_seller seller', 'p.fk_seller=seller.id')
                ->limit($limit, $offset);
        $products = $mapper->findAll(function($rawData, $instance)
        {
            $instance->seller_name = $rawData['seller_name'];
        });
        $total_record = $mapper->count();
        $json = array(
            'products'     => array(),
            'total_record' => $total_record
        );
        foreach ($products as $product)
        {
            /* @var $product ProductFixedDomain */
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = (string) $product->getName();
            $obj['price'] = (string) $product->getFinalPriceMoney($user->getCurrency());
            $obj['priceString'] = strval($product->getFinalPriceMoney($user->getCurrency()));
            $obj['priceOrigin'] = $product->priceOrigin ? (string) $product->getPriceOrigin($user->getCurrency()) : '';
            $obj['thumbnail'] = isset($images[0]) ? $images[0]->url : '';
            $obj['url'] = '/product/details/' . $product->id;
            $obj['isNew'] = $product->isNew();
            $obj['salesPercent'] = $product->getSalesPercent();
            $json['products'][] = $obj;
        }
        echo json_encode($json);
    }

}
