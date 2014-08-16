<?php

/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice mà chưa thông qua login page.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderVerifingAuthenicated extends BasePortalController
{
    protected $authorization_required = FALSE;
    protected $css = array('/style/portalOrder.css');
    protected $js =  array();
    
    
    function orderPlaceVerifyOrder(){
        $getData = $_GET;
        $orderId = $getData['o'];
        $invoiceId = $getData['i'];
        
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        
        if($orderInformation == null){
            $dataview = array();
            $dataview['result'] = false;
            $dataview['invoiceId'] = $invoiceId;
            $dataview['orderId'] = $orderId;
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setData($dataview)
            ->setCss($this->css)
            ->render('portalPayment/orderVefiry');
        }
        
        
        $invoiceCheck = false;
        $orderStatusCheck = ($orderInformation->status == DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED);
        foreach ($orderInformation->invoices as $invoice)
        {
            if($invoice->id == $invoiceId){
                $invoiceCheck = true;
                break;
            }
        }
        
        $dataview = array();
        $dataview['result'] = ($invoiceCheck & $orderStatusCheck);
        $dataview['invoiceId'] = $invoiceId;
        $dataview['orderId'] = $orderId;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($dataview)
        ->setCss($this->css)
        ->render('portalPayment/orderVefiry');
    }
    
}