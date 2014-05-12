<?php
class PortalPaymentNganLuong{
    
    /**
     * s
     * @param string $invocieId
     * @param string $orderId
     * @param User $user
     * @return string
     */
    function getCheckOutUrl($invocieId, $orderId, $user )
    {
        $invoiceInformation = $this->calculationInvoice($invocieId, $orderId);
        $modelContact = new PortalModelUserContact();
        $modelContact->getOneById();
        
        $nlCheckout = new NL_Checkout();
        $nganLuongConfig = get_instance()->config->item('ngan_luong');
        $nlCheckout->nganluong_url = $nganLuongConfig['NGANLUONG_URL'];
        $nlCheckout->merchant_site_code = $nganLuongConfig['MERCHANT_ID'];
        $nlCheckout->secure_pass = $nganLuongConfig['MERCHANT_PASS'];
        $receiver = $nganLuongConfig['receiver'] ;
        $return_url = $nganLuongConfig['return_url'] ;
        
        $order_code = $orderId;
        $price = $invoiceInformation->totalCost;
        $transaction_info = "Giao dịch tại SFRENIDLY";
        $currency = "vnd";
        $quantity = 1;
        $tax = 0;
        $discount = 0;
        $fee_cal = 0;
        $fee_shipping = 0;
        $order_description = "mua thẻ Club 50";
        $buyer_info = "";
        $affiliate_code = "";
        
        $url= $nlCheckout->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
        return $url;
    }
    
    private function calculationInvoice($invocieId,$orderId)
    {
        $payment = new PortalBizPaymentHistory();
        $orderInformation = $payment->getOrderInforamtion($orderId);
        $invoiceInformation = null;
        foreach ( $orderInformation->invoices as $invoice ){
            if($invocieId == $invoice->id){
                $invoiceInformation = $invoice;
            }
        }
        
        if($invoiceInformation == null){
            throw new Exception(__FILE__." ".__LINE__.' '.' Không tìm thấy inivoice mong muốn.');
        }
        
        $payment = new PortalBizPaymentHistory();
        $payment->preInvoice($invoiceInformation);
        
        return $invoiceInformation;
    }
}