<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderNewController extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalOrderRefunedController.js',
        '/js/services/PortalAdminOrderServiceClient.js'
    );
    
    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderNew');
    }
    

}
