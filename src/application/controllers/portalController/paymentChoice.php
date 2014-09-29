<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class paymentChoice extends BasePortalController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css','/style/customerList.css');
    protected $js = array('/js/controller/PortalOrderPaymentChoiceController.js');
    
    function showPage(){
        $postData = $this->input->get();
        $orderId = $postData['o'];
        $invoiceId = $postData['i'];
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
        }
        
        $this->convertCurrencyOrder($orderInformation);
        $this->calutionForviewView($orderInformation,$invoiceId);
        
        $dataView = array();
        $dataView['order'] = $orderInformation;
        $dataView['payment'] = $this->config->item('payment_gateway_supported');
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($dataView)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/paymentChoice');
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
    
    
    }
    
    private function calutionForviewView(&$orderInfor,$invoiceId){
        $invoice = null;
        foreach ($orderInfor->invoices as $invoiceItem){
            if($invoiceItem->id == $invoiceId){
                $invoice = $invoiceItem;
                break;
            }
        }
        unset($orderInfor->invoices);
        $orderInfor->invoice = $invoice;
    }

}