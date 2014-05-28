<?php

/**
 * Xử lý các liên quan đến việc xử login
 * @author ANLT
 * @since 20140429
 */
class PortalBizInvoice extends PortalBizBase
{
    function getFullInformationInvoice($invoiceId){
        
        $portalModelInvoice = new PortalModelInvoice();
        $portalModelInvoice->id = $invoiceId;
        $portalModelInvoice->getOneById();
        if(!isset($portalModelInvoice->fk_order)|| $portalModelInvoice->fk_order == null ){
            return null;
        }
        
        $order = $this->getOrder($invoiceId,true);
        $products = $this->getProductsOfInvoices(array($invoiceId), true);
        $otherCosts = $this->getOtherCostOfInvoices(array($invoiceId));
        $shippings = $this->getShippingOfInvoices(array($invoiceId),true);
        $portalModelInvoice->order = $order;
        $portalModelInvoice->products = $products;
        $portalModelInvoice->otherCosts = $otherCosts;
        $portalModelInvoice->shippings = $shippings;
        
        return $portalModelInvoice;
    }
    

    
   function getOrder($invoiceId,$isGetUser = false){
       $portalModelInvoice = new PortalModelInvoice();
       $portalModelInvoice->id = $invoiceId;
       $portalModelInvoice->getOneById();

       $portalModelOrder = new PortalModelOrder();
       $portalModelOrder->id = $portalModelInvoice->fk_order;
       $portalModelOrder->getOneById();
       
       if($isGetUser){
           $portalModelOrder->user = null;
           if($portalModelOrder->fk_user == null && !isset($portalModelOrder->fk_user)){

               $portalmodelUser = new PortalModelUser();
               $portalmodelUser->id = $portalModelOrder->fk_user;
               $portalmodelUser->getUserByUserId();
               $portalModelOrder->user = $portalmodelUser;
           }
       }
       
       return $portalModelOrder;
   }
    
   function getProductsOfInvoices($invoicesId,$isGetTax = false){
        $products = array();
        $portalProduct = new PortalModelProduct();
        $products = $portalProduct->getProductsOfInvoices($invoicesId);
        if($isGetTax){
            $productsId = array();
            foreach ($products as $product)
            {
                array_push($productsId, $product->id);
            }
            $portalModelTax = new PortalModelTax();
            $taxsProducts = $portalModelTax->getTaxByProductIds($productsId);
            foreach ($products as &$product){
                $product->taxs = array();
                foreach ($taxsProducts as $tax){
                    if($product->id == $tax->fk_product){
                        array_push($product->taxs, $tax);
                    }
                }
            }
        }
        return $products; 
    }
    
    function getOtherCostOfInvoices($invociesId)
    {
        $portalModelOtherCost = new PortalModelInvoiceOtherCost();
        return $portalModelOtherCost->getInvoicesOtherCost($invociesId);
    }
    
    function getTaxOfProducts($products){
        $portalModelTax = new PortalModelTax();
        $productIds = array();
        foreach ($products as $product){
            array_push($productIds, $product->id);
        }
        return $portalModelTax->getTaxByProductIds($productIds);
    }
    
    function getShippingOfInvoices($invociesId,$isGetContact = false)
    {
        $portalModelShipping = new PortalModelInvoiceShipping();
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
    
    function getInvoiceAllInformationAndTotalPrices($invoiceId){
        $invoice = $this->getFullInformationInvoice($invoiceId);
        return $this->preInvoice($invoice);
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