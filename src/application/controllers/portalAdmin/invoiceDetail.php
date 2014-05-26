<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class invoiceDetail extends PortalAdminControllerAbstract
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    protected $js = array(
        '/js/controller/PortalAdminInvoiceController.js',
        '/js/services/PortalAdminInvoiceServiceClient.js'
    );

    function showPage($invoiceId)
    {
        
        $portalmodelInvoice = new PortalModelInvoice();
        $portalmodelInvoice->id = $invoiceId;
        $portalmodelInvoice->getOneById();
        if($portalmodelInvoice->fk_order == null || !isset($portalmodelInvoice->fk_order)){
            throw new Lynx_RoutingException(__FILE__.' '.__LINE__.' '.'Page not found '.$_POST['REQUEST_URI']);
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/invoiceDetail');
    }

}
