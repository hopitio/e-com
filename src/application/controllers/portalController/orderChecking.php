<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
class orderChecking extends BasePortalController
{
    protected $authorization_required = False;
    
    function showPage(){
        $orderId = $this->input->get('order');
        $userEmail = $this->input->get('email');
        if(empty($orderId) || empty($userEmail)){
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(array(), true)
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
        if(count($accounts) == 0 || count($orders) == 0){
            $data["isExits"] = false;
        }
        
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
        foreach ($order->invoices as &$invoice){
            foreach($invoice->products as &$product){
                $product->sell_price =  $this->convertToCurrentCurrency($product->sell_price);
                $product->product_price =  $this->convertToCurrentCurrency($product->product_price);
            }
            unset($product);
    
            foreach ($invoice->shippings as &$shipping){
                $shipping->price = $this->convertToCurrentCurrency($shipping->price);
            }
            unset($shipping);
    
            foreach ($invoice->otherCosts as &$cost){
                $cost->value = $this->convertToCurrentCurrency($cost->value);
            }
            unset($cost);
    
            $invoice->totalCost = $this->convertToCurrentCurrency($invoice->totalCost);
        }
        unset($invoice);
        return $order;
    }
    
}