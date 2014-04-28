<?php
/**
 * 
 * @author ANLT
 *
 */
class PortalBizPaymentHistory extends PortalBizBase{
    
    /**
     * get all order
     * @param User $user
     */
    function getAllOrderOfUser($user){
        $portalOrder = new PortalModelOrder();
        $portalOrder->fk_user = $user;
        $orders = $portalOrder->getMutilCondition();
        return $orders;
    }
    
    /**
     * lấy toàn bộ invoice
     * @param orderId $orderId
     */
    function getInvoiceOfOrder($orderId){
        $portalInvoice = new PortalModelInvoice();
        $portalInvoice->fk_order = $orderId;
        return $portalInvoice->getMutilCondition();
    }
    
    /**
     * lấy toàn bộ sản phẩm của invoice.
     * @param array $invoices
     */
    function getProductsOfInvoices($invoices){
       
        $portalProduct = new PortalModelProduct();
        $invoicesId = array();
        foreach ($invoices as $invoice){
            array_push($invoicesId, $invoice->id);
        }
        return $portalProduct->getProductsOfInvoices($invoicesId);
    }
    
    /**
     * 
     * @param unknown $invocies
     */
    function getShippingOfInvoices($invocies)
    {
        $portalModelShipping = new PortalModelInvoiceShipping();
        $invociesId = array();
        foreach ($invocies as $invoice){
            array_push($invociesId, $invoice->id);
        }
        return $portalModelShipping->getShippingOfInvoicesId($invociesId);
    }
    
    /**
     * 
     * @param unknown $invoices
     */
    function getOtherCostOfInvoices($invocies)
    {
        $portalModelOtherCost = new PortalModelInvoiceOtherCost();
        $invociesId = array();
        foreach ($invocies as $invoice){
            array_push($invociesId, $invoice->id);
        }
        return $portalModelOtherCost->getInvoicesOtherCost($invociesId);
    }
    
    /**
     * 
     * @param unknown $products
     * @return Ambigous <multitype:, multitype:>
     */
    function getTaxOfProducts($products){
        $portalModelTax = new PortalModelTax();
        $productIds = array();
        foreach ($products as $product){
            array_push($productIds, $product->id);
        }
        return $portalModelTax->getTaxByProductIds($productIds);
    }
    
    function getUserOrderWithStatus($user,$orderStatus = 'all')
    {
        $orderStatus = $orderStatus == 'all' ? null : $orderStatus;
        $portalModelOrder = new PortalModelOrder();
        $portalModelOrder->fk_user = $user->id;
        $orders = array();
        $status = $portalModelOrder->getOrderWithStatus($orderStatus);
        
        foreach ($status as $orderStatus)
        {
            $status = $orderStatus->status; 
            unset($orderStatus->status);
            $order = new PortalModelOrder();
            $order->autoMappingObj($orderStatus);
            $order->status = $status;
            array_push($orders, $order);
        }
        unset($orderStatus);
        foreach ($orders as &$order)
        {
            $order->invoices = $this->getOrderInforamtion($order->id);
        }
        unset($order);
        foreach ($orders as &$order){
            $this->preGetUserOrderWithStatusResult($orders);
        }
        return $orders;
    }
    
    
    /**
     * get Order ID.
     * @param unknown $orderId
     */
    function getOrderInforamtion($orderId){
        $portalInvoice = new PortalModelInvoice();
        $invoices = $portalInvoice->getInvociesByOrderIds(array($orderId));
        $products = $this->getProductsOfInvoices($invoices);
        $taxs = $this->getTaxOfProducts($products);
        foreach ($products as &$product){
            $product->taxs = array();
            foreach ($taxs as $tax){
                if($tax->fk_product == $product->id){
                    array_push($product->taxs, $tax);
                }
            }
        }
        unset($product);
        
        foreach ($invoices as &$invocie)
        {
            $invocie->products = array();
            foreach ($products as $product){
                 if($product->invoice_id == $invocie->id){
                     array_push($invocie->products, $product);
                 }
            }
        }
        unset($invocie);
        
        $shippings = $this->getShippingOfInvoices($invoices);
        foreach ($invoices as &$invocie)
        {
            $invocie->shippings = array();
            foreach ($shippings as $shipping){
                if($shipping->fk_invoice == $invocie->id){
                    array_push($invocie->shippings, $shipping);
                }
            }
        }
        unset($invocie);
        
        $otherCosts = $this->getOtherCostOfInvoices($invoices);
        foreach ($invoices as &$invocie)
        {
            $invocie->otherCosts = array();
            foreach ($otherCosts as $otherCost){
                if($otherCost->fk_invoice == $invocie->id){
                    array_push($invocie->otherCosts, $otherCost);
                }
            }
        }
        unset($invocie);
        
        return $invoices;
    }
    
    private  function preGetUserOrderWithStatusResult($orders){
        foreach ($orders as &$order)
        {
            $cost = 0;
            foreach ($order->invoices as &$invoice){
                $this->preInvoice($invoice);
                if($invoice->invoice_type == "input"){
                    $cost += $invoice->totalCost;
                }else{
                    $cost -= $invoice->totalCost;
                }
            }
            $order->cost = $cost;
        }
        foreach ($orders as &$order)
        {
            $order->uniqueProducts = array();
            $arrayAllProducts = array();
            foreach ($order->invoices as &$invoice){
                $arrayAllProducts = array_merge($arrayAllProducts,$invoice->products);
            }
            foreach ($arrayAllProducts as $productInvoice)
            {
                foreach ($order->uniqueProducts as $product)
                {
                    if($product->id == $productInvoice->id)
                    {
                    	continue 2;
                    }
                }
                array_push($order->uniqueProducts, $productInvoice);
            }
        }
        return $order;
    }
    private function preInvoice(&$invoice){
        $invoice->totalCost = 0;
        foreach ($invoice->products as &$product)
        {
            $product->totalTax = 0;
            foreach ($product->taxs as $tax)
            {
                $product->totalTax += $tax->sub_tax_value;
            }
            $invoice->totalCost += ($product->totalTax + $product->total_price);
        }
        
        foreach ($invoice->otherCosts as $otherCost)
        {
            $invoice->totalCost += $otherCost->value;
        }
        
        foreach ($invoice->shippings as $shipping)
        {
            $invoice->totalCost += $shipping->price;
        }
    }
}