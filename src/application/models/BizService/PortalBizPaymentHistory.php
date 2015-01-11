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
    function getShippingOfInvoices($invocies,$isGetContact = false)
    {
        $portalModelShipping = new PortalModelInvoiceShipping();
        $invociesId = array();
        foreach ($invocies as $invoice){
            array_push($invociesId, $invoice->id);
        }
        $shippings = $portalModelShipping->getShippingOfInvoicesId($invociesId);
        $portalModelContact = new PortalModelUserContact();
        
        if($isGetContact){
            $contactIds = array();
            foreach ($shippings as $shipping){
                array_push($contactIds, $shipping->fk_user_contact);
            }
            $contacts = $portalModelContact->getContactByContactIds($contactIds);
            foreach ($shippings as &$shipping){
                $shipping->contact = null;
                foreach ($contacts as $contact){
                    if($shipping->fk_user_contact == $contact->id){
                        $shipping->contact = $contact;
                    }
                }
            }
        }
        return $shippings;
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
        $orderIds = array();
        foreach ($orders as $order){
            array_push($orderIds, $order->id);
        }
        
        $orders = $this->getOrderAllInformation($orderIds);
        
        foreach ($orders as &$order){
            $this->preGetUserOrderWithStatusResult($orders);
        }
        return $orders;
    }
    
    
    /**
     * get orders
     * @param array | orderId $orderId
     * @return array | orderId
     */
    function getOrderAllInformation($orderId){
        $selectOne = (!is_array($orderId)) || (is_array($orderId) && count($orderId) == 1);
        $orderIds = is_array($orderId) ? $orderId : array($orderId);
        if(count($orderIds) == 0){
        	return array();
        }
        $portalModelOrder = new PortalModelOrder();
        $orders = array();
        $status = $portalModelOrder->getOrderWithCurrentStatus($orderIds);
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
        
        $arrOrderIds = array();
        foreach ($orders as $order){
            array_push($arrOrderIds, $order->id);
        };
        
        $invoices = $this->getInvoicesInforamtion($arrOrderIds);
        foreach ($orders as &$order){
            $order->invoices = array();
            foreach ($invoices as $invoice){
                if($invoice->fk_order == $order->id){
                    array_push($order->invoices, $invoice);
                }
            }
        }
        foreach ($orders as &$order){
            $this->preGetUserOrderWithStatusResult($orders);
        }
        if($selectOne){
            return $orders[0];
        }
        return $orders;
    }

    
    /**
     * get all invoice information 
     * @param array $orderId
     */
    function getInvoicesInforamtion(array $orderIds){
        $portalInvoice = new PortalModelInvoice();
        $invoices = $portalInvoice->getInvociesByOrderIds($orderIds);
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

        $shippings = $this->getShippingOfInvoices($invoices,true);
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
    
    /**
     * get information of invoice
     * @param string $invocieId
     */
    function getInvoiceInformation($invocieId){
        $portalInvoice = new PortalModelInvoice();
        $portalInvoice->id = $invocieId;
        $invoices = $portalInvoice->getMutilCondition();
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
        
        $shippings = $this->getShippingOfInvoices($invoices,true);
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
        
        return $invoices[0];
    }
    
    private function preGetUserOrderWithStatusResult($orders){
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
    
    public function preInvoice(&$invoice){
        $invoice->totalCost = 0;
        foreach ($invoice->products as &$product)
        {
            $product->totalTax = 0;
            foreach ($product->taxs as $tax)
            {
                $product->totalTax += $tax->sub_tax_value;
            }
            $invoice->totalCost += ($product->totalTax + $product->product_price);
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