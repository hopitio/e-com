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
    
    function refunedOrder($user,$orderId,$products,$contact,$otherCosts,$comment)
    {
        $PortalOrderCanncel = new PortalOrderRefuned($user, $orderId, $products, $contact, $otherCosts, $comment);
        $invoiceId = $PortalOrderCanncel->process($orderId);
        parent::mailBuyer($orderId, $invoiceId , MailManager::ORDER_REFUND);
        parent::mailSeller($orderId, $invoiceId , MailManager::SELLER_FAIL_TO_DELIVERED);
        return $invoiceId;
    }
    
    function orderPlace($isSendMail,$userUpdate, $orderId, $invoiceId){
       $portalPaymentHistory = new PortalBizPaymentHistory();
       $order = $portalPaymentHistory->getOrderAllInformation($orderId);
       parent::updateOrderToOrderPlace($userUpdate, $orderId, '');
       if($isSendMail){
           parent::mailBuyer($orderId, $invoiceId , MailManager::ORDER_PLACES);
           parent::mailSeller($orderId, $invoiceId , MailManager::SELLER_PAYMENT_VERIFIED);
       }
    }
    
    /**
     * 
     */
    function addNewInvoice($user,$orderId,$invoiceType,$products,$contact,$otherCosts,$comment,$paidedDate,$nlCode){
        $PortalOrderCanncel = new PortalOrderInvoice($user, $orderId, $products, $contact, $otherCosts, $comment,$paidedDate,$nlCode);
        $invoiceId = $PortalOrderCanncel->process($orderId,$invoiceType);
        return $invoiceId;
    }
}