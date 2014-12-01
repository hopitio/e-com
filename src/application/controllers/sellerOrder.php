<?php
require_once 'seller.php';
class sellerOrder extends seller
{
    function showPage(){
        $stdClass = new stdClass();
        $stdClass->sellerId = $this->sellerInstance->id;
        $stdClass->apiUrl = str_replace("{seller_id}", $this->sellerInstance->id, $this->config->item("portal_seller_search_api"));
        //TODO: DEBUG CODE :
        $stdClass->apiUrl = str_replace("{seller_id}", "0", $this->config->item("portal_seller_search_api"));
        $stdClass->sellerId = "0";
        $config = array(
            "config" => $stdClass
        );
        $this->_layout->setData($config,false)->render("seller/orders");
    }
    
    function invocieDetail($orderId){
        $stdClass = new stdClass();
        $stdClass->sellerId = $this->sellerInstance->id;
        $stdClass->apiUrl = str_replace("{invoice_id}", $orderId, $this->config->item("portal_seller_invoice_detail_api"));
        
        //config DEBUG CODE
        $stdClass->sellerId = 0;
        $stdClass->apiUrl = str_replace("{invoice_id}", $orderId, $this->config->item("portal_seller_invoice_detail_api"));
        
        $config = array(
            "config" => $stdClass
        );
        $this->_layout->setData ( $config, false )->setJavascript ( array (
                "/js/angular-route.min.js",
                "/js/filters.js",
                "/js/app.js",
                "/js/controller/SellerInvoiceDetailController.js" 
        ) )->render ( "seller/invoice_detail" );
    }
}
