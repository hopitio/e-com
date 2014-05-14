<?php
require_once APPPATH.'controllers/portalController/orderPlace.php';
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice mà chưa thông qua login page.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderPlace extends BaseController
{
    protected $authorization_required = FALSE;
    protected $css = array('/style/portalOrder.css');
    protected $js =  array();
    
    function getInformation()
    {
        $data = $this->input->post();
        $data = json_decode($data['order']);
        $tempId = $this->insertTempData();
        
        $paymentManager = new PortalPaymentManager();
        $tempData = $paymentManager->getPaymentByPaymentKey($tempId);
        
        $portalOrderData = $paymentManager->createNewOrder($data, $data->su,$data->secretKey);
        $paymentManager->updatePaymentTempToProcessed($tempData);
        
        redirect("portal/order_place/verify?o={$portalOrderData['orderId']}&i={$portalOrderData['invoiceId']}");
    }
    
    function orderPlaceVerifyOrder(){
        $getData = $this->getQueryStringParams();
        $orderId = $getData['o'];
        $invoiceId = $getData['i'];
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            $dataview = array();
            $dataview['result'] = false;
            $dataview['i'] = $invoiceId;
            $dataview['o'] = $orderId;
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
        $dataview['i'] = $invoiceId;
        $dataview['o'] = $orderId;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($dataview)
        ->setCss($this->css)
        ->render('portalPayment/orderVefiry');
    }
    
    
    private function insertTempData()
    {
        $data = $this->input->post();
        $paymentBiz = new PortalPaymentManager();
        $theKey  = $paymentBiz->insertTemp($data['order']);
        return $theKey;
    }

}