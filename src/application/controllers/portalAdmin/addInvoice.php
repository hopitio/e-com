<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class addInvoice extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalAdminAddInvoiceController.js',
        '/js/services/PortalAdminAddInvoiceServiceClient.js'
    );
    
    function showPage($orderId)
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/addInvoice');
    }

}
