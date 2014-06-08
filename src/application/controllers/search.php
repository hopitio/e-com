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
                    'keywords' => $this->input->get('s')
                ))
                ->render('search/show_page');
    }

    function getProductService()
    {
        header('Content-type:application/json');
        $user = User::getCurrentUser();
        $keywords = $this->input->get('s');
        $limit = 20;
        $page_no = (int) $this->input->get('p');
        if (!$page_no)
        {
            $page_no = 1;
        }
        $offset = ($page_no - 1) * $limit;
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
            'total_record' => $total_record,
            'limit'        => $limit
        );
        foreach ($products as $product)
        {
            /* @var $product ProductFixedDomain */
            $images = $product->getImages('thumbnail');
            $obj = get_object_vars($product);
            $obj['name'] = (string) $product->getName();
            $obj['price'] = (string) $product->getFinalPriceMoney($user->getCurrency());
            $obj['thumbnail'] = $images[0]->url;
            $obj['url'] = '/product/details/' . $product->id;
            $json['products'][] = $obj;
        }
        echo json_encode($json);
    }

}
