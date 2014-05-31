<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderReview extends BasePortalController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css');
    protected $js = array('/js/controller/PortalOrderComplete.js');
    function showPage(){
        $postData = $this->input->post();
        $orderId = $postData['orderId'];
        $invoiceId = $postData['invoiceId'];
       
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
        }
        $this->calutionForviewView($orderInformation,$invoiceId);
        
        $dataView = array();
        $dataView['order'] = $orderInformation;
        $dataView['paymentChoice'] = $postData['paymentChoice'];
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($dataView)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('portalPayment/orderReview');
    }
    
    private function calutionForviewView(&$orderInfor,$invoiceId){
        $postData = $this->input->post();
        $paymentKey = $postData['paymentChoice'];
        $payment = $this->config->item('payment_gateway_supported');
        $invoice = null;
        foreach ($orderInfor->invoices as $invoiceItem){
            if($invoiceItem->id == $invoiceId){
                $invoice = $invoiceItem;
                break;
            }
        }
        unset($orderInfor->invoices);
        $orderInfor->invoice = $invoice;
        $totalPrices = $orderInfor->invoice->totalCost;
        $freeSynx = $payment[$paymentKey]['isPercent'] == '1' ?  ($payment[$paymentKey]['value'] * 100).'%' : $payment[$paymentKey]['value'].' ';
        $totalfree = $payment[$paymentKey]['isPercent'] == '1' ? ($payment[$paymentKey]['value'] * $totalPrices) : $payment[$paymentKey]['value'];
        $totalPrices = $totalPrices + $totalfree;
        
        $modelOtherCost = new PortalModelInvoiceOtherCost();
        switch($paymentKey){
        	case 'visaAndMaster':
        	    $modelOtherCost->comment = DatabaseFixedValue::PAYMENT_BY_VISA;
        	    break;
        	case 'NganLuong':
        	    $modelOtherCost->comment = DatabaseFixedValue::PAYMENT_BY_NGANLUONG;
        	    break;
        	case 'Onepay' :
        	    $modelOtherCost->comment = DatabaseFixedValue::PAYMENT_BY_ONEPAY;
        	    break;
        	default:
        	    $modelOtherCost->comment = DatabaseFixedValue::PAYMENT_BY_NGANLUONG;
        	    break;
        }
        
        $modelOtherCost->fk_invoice = $invoiceId;
        $modelOtherCost->value = $totalfree;
        $orderInfor->invoice->otherCosts[] = $modelOtherCost;
        $orderInfor->totalPrices = $totalPrices;
    }
    
    function submitOrder(){
        $postData = $this->input->post();
        $orderId = $postData['orderId'];
        $invoiceId = $postData['invoiceId'];
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
        }
        $this->calutionForviewView($orderInformation,$invoiceId);
        $otherCosts =  end($orderInformation->invoice->otherCosts);
        $otherCosts->insert();
        $paymentKey = $postData['paymentChoice'];
        switch ($paymentKey){
        	case 'NganLuong':
        	    $this->procInformationNganLuong($orderId, $invoiceId);
        	    break;
        }
    }
    
    private function procInformationNganLuong($orderId,$invoiceId){
        $portalPaymentNganLuong = new PortalPaymentNganLuong();
        $url = $portalPaymentNganLuong->getCheckOutUrl($invoiceId, $orderId);
        redirect($url);
        exit;
    }

}