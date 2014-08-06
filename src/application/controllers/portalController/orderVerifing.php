<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice mà chưa thông qua login page.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderVerifing extends BasePortalController
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
        $tempData->order_id = $portalOrderData['orderId'];
        $paymentManager->updatePaymentTempToProcessed($tempData);
        redirect("portal/order_verifing/verify?o={$portalOrderData['orderId']}&i={$portalOrderData['invoiceId']}");
    }
    
    
    private function insertTempData()
    {
        $data = $this->input->post();
        $paymentBiz = new PortalPaymentManager();
        $theKey  = $paymentBiz->insertTemp($data['order']);
        return $theKey;
    }

}