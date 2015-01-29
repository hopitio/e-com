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
    
    function redirect_on_get(){
        redirect("/home");
    }
    
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
            case "TRANSFER" : 
                $this->checkoutWithTransfer($orderId,$invoiceId);
            break;
        }
    }
    
    function checkoutWithATM($orderId,$invoiceId)
    {
       $nl_result =  $this->getNganLuongCheckoutUrl($orderId, $invoiceId, 'ATM');
       switch ($this->obj_user->languageKey){
            case "VN-VI":
                $nl_result->checkout_url = $nl_result->checkout_url."&lang=vn";
            default:
                $nl_result->checkout_url = $nl_result->checkout_url."&lang=en";
                break;
       }
       redirect($nl_result->checkout_url);
    }
    
    function checkoutWithVISA($orderId, $invoiceId)
    {
        $nl_result = $this->getNganLuongCheckoutUrl($orderId, $invoiceId, 'VISA');
        switch ($this->obj_user->languageKey){
        	case "VN-VI":
        	    $nl_result->checkout_url = $nl_result->checkout_url."&lang=vn";
        	default:
        	    $nl_result->checkout_url = $nl_result->checkout_url."&lang=en";
        	    break;
        }
        redirect($nl_result->checkout_url);
    }
    
    function checkoutWithNL($orderId, $invoiceId)
    {
       $nl_result =  $this->getNganLuongCheckoutUrl($orderId, $invoiceId, 'NL');
       switch ($this->obj_user->languageKey){
       	case "VN-VI":
       	    $nl_result->checkout_url = $nl_result->checkout_url."&lang=vn";
       	default:
       	    $nl_result->checkout_url = $nl_result->checkout_url."&lang=en";
       	    break;
       }
        redirect($nl_result->checkout_url);
    }
    
    private function checkoutWithCash($orderId,$invoiceId)
    {
        $orderManager = new PortalOrderManager();
        $orderManager->orderPlace(true,$this->obj_user, $orderId, $invoiceId);
        
        $invoiceIdRepository = new PortalModelInvoice();
        $invoiceIdRepository->id = $invoiceId;
        $invoiceIdRepository->payment_method = DatabaseFixedValue::PAYMENT_BY_CASH;
        $invoiceIdRepository->updateById();
        //echo $invoiceIdRepository->_dbPortal->last_query(); die;
        
        $order_repository = new PortalModelOrder();
        $order_repository->id = $orderId;
        $orderResult = $order_repository->getOneById();
        $user_id = $orderResult->fk_user;
        $user_repository = new PortalModelUser();
        $user_repository->id = $user_id;
        $user_result = $user_repository->getOneById();
        $user_result instanceof PortalModelUser;
        $email = urlencode($user_result->account);
        $url = "/portal/order/checking?email={$email}&order={$orderId}";
        $data = array("order_information_url" => $url);
        
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData(array('isError'=>false, "order_information_url" => $url))
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentSuccess');
    }
    
    private function checkoutWithTransfer($orderId,$invoiceId)
    {
        $orderManager = new PortalOrderManager();
        $orderManager->orderPlace(true,$this->obj_user, $orderId, $invoiceId);
        
        $orderRepository = new PortalModelInvoice();
        $orderRepository->id = $invoiceId;
        $orderRepository->payment_method = DatabaseFixedValue::PAYMENT_BY_TRANSFER;
        
        $order_repository = new PortalModelOrder();
        $order_repository->id = $orderId;
        $orderResult = $order_repository->getOneById();
        $user_id = $orderResult->fk_user;
        $user_repository = new PortalModelUser();
        $user_repository->id = $user_id;
        $user_result = $user_repository->getOneById();
        $user_result instanceof PortalModelUser;
        $url = "/portal/order/checking?email={$user_result->account}&order={$orderId}";
        $data = array("order_information_url" => $url);
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData(array('isError'=>false, "order_information_url" => $url))
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentSuccess');
    }

    private function getNganLuongCheckoutUrl($orderId,$invoiceId,$paymentMethod)
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
        $order_code = "{$nganLuongConfig['order_name']}-{$orderId}-{$invoiceId}";
        $total_amount = 0;
        $payment_type = 1;
        $discount_amount = 0;
        $order_description = '';
        $tax_amount = 0;
        $fee_shipping = $shipping->price;
        $return_url = urlencode(Common::getCurrentHost()."/portal/ngan-luong/callback/success?order-id={$orderId}&invoice-id={$invoiceId}");
        $cancel_url = urlencode(Common::getCurrentHost()."/portal/ngan-luong/callback/cancel?order-id={$orderId}&invoice-id={$invoiceId}");
        $buyer_fullname = $shipping->contact->full_name;
        $buyer_email = $orderInformation->user->account;
        $buyer_mobile = $shipping->contact->telephone;
        $buyer_address = "{$shipping->contact->street_address}, {$shipping->contact->city_district}";
        $array_items = array();
        
        $index = 1;
        foreach ($invoice->products as $product){
            $total_amount +=  $product->product_price;
            array_push($array_items,
            array(
                "item_name{$index}" => empty($product->name) ? 'sfriendly' : $product->name,
                "item_quantity{$index}" => $product->product_quantity,
                "item_amount{$index}" => $product->product_price / $product->product_quantity,
                "item_url{$index}"=> Common::getCurrentHost().'/product/details/'.$product->sub_id)
            );
            $index++;
        }
        
        if( $this->config->item("on-demo-payment")){
            $total_amount =  10000;
            $fee_shipping = 0;
            $index = 1;
            foreach ($array_items as &$item){
                if($index == 1){
                    $item["item_quantity{$index}"] = 2; 
                    $item["item_amount{$index}"] = 5000;
                }else{
                    $item["item_amount{$index}"] = 0;
                }
                 
                $index++;
            }
            unset($item);
        }
        
        switch ($paymentMethod){
            case 'ATM':
                $nl_result = $nlcheckout->BankCheckout($order_code, 
                    $total_amount, $bank_code, $payment_type, $order_description, 
                    $tax_amount, $fee_shipping, $discount_amount, $return_url, 
                    $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, 
                    $buyer_address, $array_items);
                break;
            case 'VISA':
                $nl_result = $nlcheckout->VisaCheckout($order_code, 
                    $total_amount, $payment_type, $order_description, 
                    $tax_amount, $fee_shipping, $discount_amount, $return_url, 
                    $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, 
                    $buyer_address, $array_items);
                break;
            case 'NL':
                $nl_result = $nlcheckout->NLCheckout($order_code, $total_amount, 
                    $payment_type, $order_description, $tax_amount, 
                    $fee_shipping, $discount_amount, $return_url, $cancel_url, 
                    $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, 
                    $array_items);
                break;
        }
        if($nl_result->error_code != 00)
        {
            $errorMsg = $nl_result->error_message;
            $errorMsg .= "\n";
            $errorMsg .= "Post data".json_encode($this->input->post());
            throw new Lynx_NganLuongIntergation($errorMsg);
            return;
        }
        
        $this->session->set_userdata('NGANLUONG_PAYMENT_TOKEN_KEY',$nl_result->token->__toString());
        $this->session->set_userdata('NGANLUONG_PAYMENT_ORDER_ID',$orderId);
        $this->session->set_userdata('NGANLUONG_PAYMENT_INVOICE_ID',$invoiceId);
        
        $this->savePayment($orderId,$invoiceId,$nl_result);
        return $nl_result;
    }
    
    
    private function savePayment($orderId,$invoiceId,$getTokenResult)
    {
        $paymentNganLuongRepository = new PortalModelNLPayment();
        $paymentNganLuongRepository->order_id = $orderId;
        $paymentNganLuongRepository->invoice_id = $invoiceId;
        $paymentNganLuongRepository->token_key = $getTokenResult->token->__toString();
        $paymentNganLuongRepository->expiration_at = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE, strtotime("+1 day")); // hết hạn trong vong 1 ngày
        $paymentNganLuongRepository->insert();
    }
}