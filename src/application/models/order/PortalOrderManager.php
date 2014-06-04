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
}