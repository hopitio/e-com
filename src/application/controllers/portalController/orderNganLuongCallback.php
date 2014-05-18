<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý Callback từ ngân lượng.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderNganLuongCallback extends BaseController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css');
    protected $js = array('/js/controller/PortalOrderComplete.js');
    function showPage(){
        $isError = true;
        if (isset($_GET['payment_id'])) {
            $nganLuongConfig = get_instance()->config->item('ngan_luong');
            $transaction_info =$_GET['transaction_info'];
            $order_code =$_GET['order_code'];
            $price =$_GET['price'];
            $payment_id =$_GET['payment_id'];
            $payment_type =$_GET['payment_type'];
            $error_text =$_GET['error_text'];
            $secure_code =$_GET['secure_code'];
            //Khai báo đối tượng của lớp NL_Checkout
            $nl= new NL_Checkout();
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $checkpay= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
            if ($checkpay) {
                $order_code = str_replace($nganLuongConfig['order_name'],'',$order_code);
                $order_code = str_replace(' ','',$order_code);
                list($orderId,$invoiceId) = explode('-',$order_code);
                $portalBizPayment = new PortalBizPayment();
                $portalBizPayment->updateOrderToVerify(false, $orderId, $invoiceId);
                $portalBizPayment->updatePaymentMethod($invoiceId, $payment_id, DatabaseFixedValue::PAYMENT_BY_NGANLUONG);
                
                LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
                array('isError'=>false), true)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('portalPayment/paymentSuccess');
                
            }else{
                LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
                array('isError'=>false), true)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('portalPayment/paymentSuccess');
                
            }
        }else {
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
            array('isError'=>true), true)
            ->setCss($this->css)
            ->setJavascript($this->js)
            ->render('portalPayment/paymentSuccess');
        }

    }
    

}