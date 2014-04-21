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
        return $portalModelTax->getInvoiceByProductIds($productIds);
    }
    
    function getUserOrderWithStatus($user,$orderStatus = 'all')
    {
        $orderStatus = $orderStatus == 'all' ? null : $orderStatus;
        $portalModelOrder = new PortalModelOrder();
        $portalModelOrder->fk_user = $user->id;
        return $portalModelOrder->getOrderWithStatus($orderStatus);
    }
}