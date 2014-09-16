<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderRefuned extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalOrderRefunedController.js',
        '/js/services/PortalAdminOrderServiceClient.js'
    );
    
    function showPage($orderId)
    {
        $portalmodelOrder = new PortalModelOrder();
        $data = array();
        $paymentHistory = new PortalBizPaymentHistory();
        $order = $paymentHistory->getOrderAllInformation($orderId);
        $data['order'] = $order;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData($data,false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderRefuned');
    }
    
    function postOrderRefuned($orderId)
    {
        $data = json_decode($this->input->post('data'));
        $orderManager = new PortalOrderManager();
        $orderManager->refunedOrder($this->obj_user, $orderId, $data->products, $data->contact, $data->otherCosts, $data->comment);
        redirect("/portal/__admin/order/{$orderId}");
    }
    
    
    
    
    
    

}
