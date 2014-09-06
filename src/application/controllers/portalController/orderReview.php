<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/NL_Checkoutv3.php';
class orderReview extends BasePortalController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css');
    protected $js = array('/js/controller/PortalOrderComplete.js');
    function showPage(){
        
        $postData = $this->input->post();
        $orderId = $postData['order-id'];
        $invoiceId = $postData['invoice-id'];
        $bankCode = $postData['bank-code'];
        $paymentMethod = $postData['payment-method'];
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
        }
        switch ($paymentMethod){
            case 'ATM' :
                $this->checkoutWithATM($orderId,$invoiceId);
            break;
            case 'CASH' : 
                $this->checkoutWithCash($orderId,$invoiceId);
            break;
            case 'VISA' : 
                $this->checkoutWithVISA($orderId,$invoiceId);
            break;
            case 'NL' :
                $this->checkoutWithNL($orderId,$invoiceId);
            break;
        }
    }
    
    function checkoutWithATM($orderId,$invoiceId)
    {
        $nganLuongConfig = $this->config->item('ngan_luong');
        $nlcheckout= new NL_CheckOutV3( $nganLuongConfig['MERCHANT_ID'], $nganLuongConfig['MERCHANT_PASS'], $nganLuongConfig['receiver'] );
        
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        $invoice = null;
        foreach ($orderInformation->invoices as $item){
            if($item->id == $invoiceId){
                $invoice = $item;
                break;
            }
        }
        $shipping = null;
        foreach ($invoice->shippings as $shippingItem){
            if($shippingItem->shipping_type == 'SHIP'){
                $shipping = $shippingItem; 
                break;
            }
        }
        
        $bank_code = $this->input->post('bank-code');
        $order_code = "{$nganLuongConfig}-{$orderId}-{$invoiceId}";
        $total_amount = $invoice->totalCost;
        $payment_type = 1;
        $discount_amount = 0;
        $order_description = '';
        $tax_amount = 0;
        $fee_shipping = 0;
        $return_url = Common::getCurrentHost().'/ngan-luong/callback/success';
        $cancel_url = Common::getCurrentHost().'/ngan-luong/callback/canncel';
        $buyer_fullname = $shipping->full_name;
        $buyer_email = $orderInformation->user->account;
        $buyer_mobile = $shipping->telephone;
        $buyer_address = "{$shipping->street_address}, {$shipping->city_district}";
        $array_items = array();
        foreach ($invoice->products as $product){
            array_push($array_items, 
                array(
                'item_name1' => $product->name,
                'item_quantity1' => $product->product_quantity,
                'item_amount1' => $product->product_price,
                'item_url1' => Common::getCurrentHost().'/product/details/'.$product->sub_id)
           );
        }
        $nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
            $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
            $buyer_address,$array_items) ;
        //TODO: CHECKOUT TOKKEN KEY
        redirect($nl_result->checkout_url);
    }
    function checkoutWithVISA($orderId, $invoiceId)
    {
        
    }
    
    function checkoutWithNL($orderId, $invoiceId)
    {
        
    }
    
    
    private function checkoutWithCash($orderId,$invoiceId)
    {
        $orderManager = new PortalOrderManager();
        $orderManager->orderPlace(true,$this->obj_user, $orderId, $invoiceId);
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
        array('isError'=>false), true)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentSuccess');
    }

}