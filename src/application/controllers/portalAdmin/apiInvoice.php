<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class apiInvoice extends PortalAdminControllerAbstract
{
   
    function getInvoice($invoiceId)
    {
        $portalModelInvoice = new PortalModelInvoice();
        $portalModelInvoice->id = $invoiceId;
        $portalModelInvoice->getOneById();
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $portalModelInvoice;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getInvoiceProducts($invoiceId){
        $portalModelProduct = new PortalModelProduct();
        $products = $portalModelProduct->getProductsOfInvoices(array($invoiceId));
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $products;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getInvoiceOtherCost($invoiceId){
        $portalModelOtherCost = new PortalModelInvoiceOtherCost();
        $portalModelOtherCost->fk_invoice = $invoiceId;
        $otherCosts = $portalModelOtherCost->getMutilCondition(T_invoice_other_cost::id,'DESC');
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $otherCosts;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getInvoiceShipping($invoiceId){
        $portalModelInvoiceShipping = new PortalModelInvoiceShipping();
        $otherShipping = $portalModelInvoiceShipping->getShippingOfInvoicesId(array($invoiceId));
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $otherShipping;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }

}
