<?php
class PortalOrderManager extends PortalBizOrder
{
    function rejectedOrder($user,$orderId,$comment){
        $portalOrderRejected = new PortalOrderRejected($user,$orderId,$comment);
        $invoiceId = $portalOrderRejected->process();
        $revalue = parent::updateOrderToRejected($user,$orderId,$comment);
        parent::mailBuyer($orderId, $invoiceId , MailManager::ORDER_FAIL_TO_DELIVERED);
        parent::mailSeller($orderId, $invoiceId , MailManager::SELLER_FAIL_TO_DELIVERED);
        return $revalue;
    }
    
    function cancelOrder($user,$orderId,$comment){
        $PortalOrderCanncel = new PortalOrderCanncel($user,$orderId,$comment);
        $invoiceId = $PortalOrderCanncel->process();
        $revalue = parent::updateOrderToCancelled($user,$orderId,$comment);
        parent::mailBuyer($orderId, $invoiceId , MailManager::ORDER_CANCEL);
        parent::mailSeller($orderId, $invoiceId , MailManager::SELLER_FAIL_TO_DELIVERED);
        return $revalue;
    }
    
    function orderPlace($isSendMail,$userUpdate, $orderId, $invoiceId){
       $portalPaymentHistory = new PortalBizPaymentHistory();
       $order = $portalPaymentHistory->getOrderAllInformation($orderId);
       //echo json_encode($order); die;
       parent::updateOrderToOrderPlace($userUpdate, $orderId, '');
       if($isSendMail){
           parent::mailBuyer($orderId, $invoiceId , MailManager::ORDER_PLACES);
           parent::mailSeller($orderId, $invoiceId , MailManager::SELLER_PAYMENT_VERIFIED);
       }
    }
}