<?php
class PortalPaymentNganLuong{
    
    /**
     * s
     * @param string $invocieId
     * @param string $orderId
     * @param User $user
     * @return string
     */
    function getCheckOutUrl($invocieId, $orderId)
    {
        
        $nlCheckout = new NL_Checkout();
        $nganLuongConfig = get_instance()->config->item('ngan_luong');
        $nlCheckout->nganluong_url = $nganLuongConfig['NGANLUONG_URL'];
        $nlCheckout->merchant_site_code = $nganLuongConfig['MERCHANT_ID'];
        $nlCheckout->secure_pass = $nganLuongConfig['MERCHANT_PASS'];
        $receiver = $nganLuongConfig['receiver'] ;
        $return_url = $nganLuongConfig['return_url'] ;
        
        $payment = new PortalBizPaymentHistory();
        $order = $payment->getOrderAllInformation($orderId);
        foreach ( $order->invoices as $invoice ){
            if($invocieId == $invoice->id){
                $order->invoice = $invoice;
            }
        }
        
        $order_code =  $nganLuongConfig['order_name']." {$orderId} - {$invocieId}";
        $price = ceil($this->getPrices($order));
        $transaction_info = "Giao dịch tại SFRIENDLY.COM";
        $currency = "vnd";
        $quantity = $this->getQuantity($order);
        //$tax = ceil($this->getTax($order));
        $tax = 0;
        $discount = ceil($this->getDiscount($order));
        $fee_cal = ceil($this->getOtherCost($order));
        $fee_shipping = ceil($this->getShipping($order));
        $order_description = $this->getDesc($order);
        $buyer_info = $this->getBuyerInfo($order);
        
        if(ENVIRONMENT == 'development'){
            $price = 2000;
            $tax = 1;
            $fee_shipping = 1;
        }
        log_message('ERROR',"NGANLUONG :order_ code({$order_code}) price({$price}) transaction_info({$transaction_info}) 
                            quantity({$quantity}) currency({$currency}) tax({$tax}) 
                            discount({$discount}) fee_cal({$fee_cal}) fee_shipping({$fee_shipping}) 
                            order_description({$order_description}) buyer_info({$buyer_info}) ");
        $affiliate_code = "";
        
        $url= $nlCheckout->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
        return $url;
    }
    
    private function getBuyerInfo($order){
        //Họ tên người mua *|* Địa chỉ Email *|* Điện thoại *|* Địa chỉ nhận hàng
        $shippingContact = null;
        foreach ($order->invoice->shippings as $shipping)
        {
            if($shipping->shipping_type == 'SHIP'){
                $shippingContact = $shipping->contact;
            }
        }
        $fullContact = array($shippingContact->state_province,$shippingContact->city_district,$shippingContact->street_address);
        $fullContact = implode(', ', $fullContact);
        $buyerInfo = "{$shippingContact->full_name}*|**|*{$shippingContact->telephone}*|*{$fullContact}";
        return $buyerInfo;
    }
    
    private function getDesc($order){
        $nameArray = array();
        foreach ($order->invoice->products as $product)
        {
           $nameArray[] = $product->name."({$product->quantity})";
        }
        
        return implode('; ', $nameArray);
    }
    
    
    private function getQuantity($order)
    {
        $quantity = 0;
        foreach ($order->invoice->products as $product)
        {
            $quantity += $product->quantity;
        }
        return $quantity;
    }
    
    private function getTax($order){
        $taxPrices = 0;
        foreach ($order->invoice->products as $orderProducts){
            foreach ($orderProducts->taxs as $tax)
            {
                $taxPrices += $tax->sub_tax_value;
            }
        }
        return $taxPrices;
    }
    
    private function getDiscount($order){
        return 0;
    }
    
    private function getOtherCost($order){
        $costs = 0;
        foreach ($order->invoice->otherCosts as $cost){
            $costs += $cost->value;
        }
        return $costs;
    }
    
    private function getShipping($order){
        $shippingPrice = 0;
        foreach ($order->invoice->shippings as $shipping){
            $shippingPrice += $shipping->price;
        }
        return $shippingPrice;
    }
    private function getPrices($order){
        $all = 0;
        foreach ($order->invoice->products as $product){
            $all += $product->price;
        }
        $all += $this->getOtherCost($order);
        $all += $this->getTax($order);
        return $all;
    }
}