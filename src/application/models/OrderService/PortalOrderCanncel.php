<?php
class PortalOrderCanncel
{
    var $orderId = '';
    var $order = null;
    var $invoiceId = '';
    var $products = array();
    var $orderCost = array();
    var $shippings = array();
    var $user = null;
    var $comment = '';
    
    function __construct($user,$orderId,$comment){
        $this->user = $user;
        $this->orderId = $orderId;
        $this->comment = $comment;
    }
    
    function initial(){
        $portalBizPaymentHistory = new PortalBizPaymentHistory();
        $this->order = $portalBizPaymentHistory->getOrderAllInformation($this->orderId);
        
    }
    
    function getProducts(&$invoice)
    {
        foreach ($invoice->products as $product){
            if(!array_key_exists($product->id, $this->products))
            {
                $this->products[$product->id] = $product;
            }
            if($invoice->invoice_type == DatabaseFixedValue::INVOICE_TYPE_OUTPUT && 
                    array_key_exists($product->id, $this->products))
            {
                unset($this->products[$product->id]);
            }
        }
    }
    function getShippings(&$invoice)
    {
        foreach ($invoice->shippings as $shipping){
            if($shipping->status == DatabaseFixedValue::SHIPPING_STATUS_ACTIVE){
                $this->shippings[$shipping->id] = $shipping;
            }
        }
    }
    function getOtherCosts(&$invoice)
    {
        $this->orderCost = 0;
        foreach ($invoice->otherCosts as $otherCost){
            if($invoice->invoice_type == DatabaseFixedValue::INVOICE_TYPE_INPUT){
                $this->orderCost += floatval($otherCost->value);
            }else{
                $this->orderCost -= floatval($otherCost->value);
            }
        }
    }
    
    function insertNewInvoice(){
        $portalModelInvoice = new PortalModelInvoice();
        $portalModelInvoice->id = null;
        $portalModelInvoice->fk_order = $this->orderId;
        $portalModelInvoice->created_user = $this->user->id;
        $portalModelInvoice->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModelInvoice->comment = $this->comment;
        $portalModelInvoice->invoice_type = DatabaseFixedValue::INVOICE_TYPE_OUTPUT;
        $invoiceId = $portalModelInvoice->insert();
        
        
        $portalBizPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalBizPaymentHistory->getOrderAllInformation($this->orderId);
        
        $portModelInvoiceProduct = new PortalModelInvoiceProduct();
        $portalInvoiceProducts = array();
        foreach ($this->products  as &$product)
        {
            $item = new PortalModelInvoiceProduct();
            $item->fk_product = $product->id;
            $item->fk_invoice = $invoiceId;
            $item->product_price = $product->sell_price;
            
            foreach ($order->invoices[0]->products as $last){
                if($last->id == $product->id)
                {
                    $item->product_price = $last->product_price;
                    $item->product_quantity = $last->product_quantity;
                    break 1;
                }
            }
            
            
            array_push($portalInvoiceProducts, $item);
        }
        $portModelInvoiceProduct->bacthInsert($portalInvoiceProducts);
        
        
        $portalModelInvoiceShipping = new PortalModelInvoiceShipping();
        foreach ($this->shippings as &$shipping){
            $shipping->id = null;
            $shipping->fk_invoice = $invoiceId;
            $shipping->created_user = $this->user->id;
        }
        $portalModelInvoiceShipping->bacthInsert($this->shippings);
        
        $portalModelOtherCost = new PortalModelInvoiceOtherCost();
        $portalModelOtherCost->fk_invoice = $invoiceId;
        $portalModelOtherCost->comment = $this->comment;
        $portalModelOtherCost->value = $this->orderCost;
        $portalModelOtherCost->insert();
        
        return $invoiceId;
    }
    
    function process()
    {
        $this->initial();
        foreach ($this->order->invoices as &$invoice){
            $this->getProducts($invoice);
            $this->getOtherCosts($invoice);
            $this->getShippings($invoice);
        }
        $invoiceId = $this->insertNewInvoice();
        $portalBizPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalBizPaymentHistory->getOrderAllInformation($this->orderId);
        return $invoiceId;
    }
    
}