<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
class orderChecking extends BasePortalController
{
    protected $authorization_required = False;
    
    function showPage(){
        if($this->obj_user->is_authorized){
            redirect('/portal/account/order_history');
        }
        
        $orderId = $this->input->get('order');
        $userEmail = $this->input->get('email');
        if(empty($orderId) || empty($userEmail)){
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(array('user'=>$this->obj_user), true)
            ->setCss(array())
            ->setJavascript(array())
            ->render('portalOrder/orderChecking');
            return;
        }
        $data = array();
        $data["isExits"] = true;
        $portalUserRespository = new PortalModelUser();
        $portalUserRespository->account = $userEmail;
        $accounts = $portalUserRespository->getMutilCondition();
        
        $portalOrderRespository = new PortalModelOrder();
        $portalOrderRespository->id = $orderId;
        $orders =  $portalOrderRespository->getMutilCondition();
        $data["isExits"] = false;
        $data['user'] = $this->obj_user;
        if(empty($accounts) || empty($orders)){
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data, true)
            ->setCss(array())
            ->setJavascript(array())
            ->render('portalOrder/orderChecking');
            return;
        }
        $data["isExits"] = true;
        $paymentHistory = new PortalBizPaymentHistory();
        $order = $paymentHistory->getOrderAllInformation($orderId);
        $data['order'] = $order;
        
        $this->convertCurrencyOrder($order);
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data, true)
        ->setCss(array())
        ->setJavascript(array())
        ->render('portalOrder/orderChecking');
        
    }
    function convertCurrencyOrder(&$order)
    {
        $current_exchange_rate = ExchangeRateFactory::getExchangeRate(ExchangeRateFactory::EXCHANGE_NAME_VIETCOMBANK);
        $order->exchange_rate_bank_name = empty($order->exchange_rate_bank_name) ? ExchangeRateFactory::EXCHANGE_NAME_VIETCOMBANK : $order->exchange_rate_bank_name;
        $order->exchange_rate = empty($order->exchange_rate) ? $current_exchange_rate : $order->exchange_rate;
        $exchange_rate = ExchangeRateFactory::makeExchangeRateByContent($order->exchange_rate_bank_name, $order->exchange_rate);
        
        foreach ($order->invoices as &$invoice){
            foreach($invoice->products as &$product){
                $product->sell_price =  $this->convertToCurrentCurrencyByExchangeRate($product->sell_price, $exchange_rate);
                $product->product_price =  $this->convertToCurrentCurrencyByExchangeRate($product->product_price, $exchange_rate);
            }
            unset($product);
    
            foreach ($invoice->shippings as &$shipping){
                $shipping->price = $this->convertToCurrentCurrencyByExchangeRate($shipping->price, $exchange_rate);
            }
            unset($shipping);
    
            foreach ($invoice->otherCosts as &$cost){
                $cost->value = $this->convertToCurrentCurrencyByExchangeRate($cost->value, $exchange_rate);
            }
            unset($cost);
            $invoice->totalCost = $this->convertToCurrentCurrencyByExchangeRate($invoice->totalCost, $exchange_rate);
        }
        unset($invoice);
        return $order;
    }
    
}