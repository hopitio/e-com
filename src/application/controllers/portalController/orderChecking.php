<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
class orderChecking extends BasePortalController
{
    protected $authorization_required = False;
    
    function showPage(){
        $orderId = $this->input->get('order');
        $userEmail = $this->input->get('email');
        
        $data = array();
        $data["isExits"] = true;
        $portalUserRespository = new PortalModelUser();
        $portalUserRespository->account = $userEmail;
        $accounts = $portalUserRespository->getMutilCondition();
        $portalOrderRespository = new PortalModelOrder();
        $portalOrderRespository->id = $orderId;
        $orders =  $portalOrderRespository->getMutilCondition();
        if(count($accounts) == 0 || count($orders) == 0){
            $data["isExits"] = false;
        }
        
        $paymentHistory = new PortalBizPaymentHistory();
        $order = $paymentHistory->getOrderAllInformation($orderId);
        $data['order'] = $order;
        
        //TODO: SET VIEW orderChecking.php
    }
    
}