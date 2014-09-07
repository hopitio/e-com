<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý Callback từ ngân lượng.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/NL_Checkoutv3.php';
class orderNganLuongCallback extends BasePortalController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css');
    protected $js = array();
    
    function success()
    {
        $tokenKey = $this->session->userdata('NGANLUONG_PAYMENT_TOKEN_KEY');
        $orderId = $this->session->userdata('NGANLUONG_PAYMENT_ORDER_ID');
        $invocieId = $this->session->userdata('NGANLUONG_PAYMENT_INVOICE_ID');
        
        if(!isset($tokenKey) || !isset($orderId) || !isset($invocieId)){
            $tokenKey = $this->input->get('token');
            $orderId = $this->input->get('invoice-id');
            $invocieId = $this->input->get('order-id');
        }
        
        if(!isset($tokenKey) || !isset($orderId) || !isset($invocieId)){
            throw new Lynx_BusinessLogicException('Không xác định được giao dịch');
        }
        
        $nganLuongConfig = $this->config->item('ngan_luong');
        $nlcheckout= new NL_CheckOutV3( $nganLuongConfig['MERCHANT_ID'], $nganLuongConfig['MERCHANT_PASS'], $nganLuongConfig['receiver'] );
        $order  =  $nlcheckout->GetTransactionDetail($tokenKey);
        if($order->error_code != 00){
            throw new Lynx_BusinessLogicException('Ngân lương error code:'.$order->error_code->__toString());
        }
        log_message('error',var_export($order,true));
        
        $portalBizPayment = new PortalBizPayment();
        $portalBizPayment->updateOrderToOrderPlace(false, $orderId, $invocieId);
        $portalBizPayment->updatePaymentMethod($invocieId, $tokenKey, DatabaseFixedValue::PAYMENT_BY_NGANLUONG);
        
        
        $this->session->unset_userdata('NGANLUONG_PAYMENT_TOKEN_KEY');
        $this->session->unset_userdata('NGANLUONG_PAYMENT_ORDER_ID');
        $this->session->unset_userdata('NGANLUONG_PAYMENT_INVOICE_ID');
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
        array('isError'=>false), true)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentSuccess');
    }
    
    function cancel()
    {
        $tokenKey = $this->session->userdata('NGANLUONG_PAYMENT_TOKEN_KEY');
        $orderId = $this->session->userdata('NGANLUONG_PAYMENT_ORDER_ID');
        $invocieId = $this->session->userdata('NGANLUONG_PAYMENT_INVOICE_ID');
        $nganLuongConfig = $this->config->item('ngan_luong');
        $nlRepository = new PortalModelNLPayment();
        $nlRepository->token_key = $tokenKey;
        $nlRepository->order_id = $orderId;
        $nlRepository->invoice_id = $invocieId;
        $results = $nlRepository->getMutilCondition();
        if(count($results) == 0){
            throw new Lynx_BusinessLogicException('Giao dịch không tồn tại');
        }
        
        $this->session->unset_userdata('NGANLUONG_PAYMENT_TOKEN_KEY');
        $this->session->unset_userdata('NGANLUONG_PAYMENT_ORDER_ID');
        $this->session->unset_userdata('NGANLUONG_PAYMENT_INVOICE_ID');
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData(
            array('isError'=>true,'',"orderId"=>$orderId, "invocieId"=>$invocieId, "isBack" => false), 
            true)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentSuccess');
        
        
    }
    

}