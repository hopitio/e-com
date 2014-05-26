<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderDetail extends PortalAdminControllerAbstract
{
//     function __construct()
//     {
//         parent::__construct();
//     }
    
    protected $js = array(
        '/js/controller/PortalAdminOrderController.js',
        '/js/services/PortalAdminOrderServiceClient.js'
    );
    
    
    
    function showPage($orderId)
    {
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $portalmodelOrder->getOneById();
        if($portalmodelOrder->created_date  == null || !isset($portalmodelOrder->created_date)){
            throw new Lynx_RoutingException(__FILE__.' '.__LINE__.' '.'Page not found '.$_POST['REQUEST_URI']);
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderDetail');
    }

}
