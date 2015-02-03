<?php
class PortalOrderFailedToDelivery
{
    var $orderId = '';
    var $order = null;
    var $invoiceId = '';
    var $products = array();
    var $orderCost = array();
    var $shippings = array();
    var $user = null;
    var $comment = '';
    
    function __construct($user,$orderId,$comment){
        $this->user = $user;
        $this->orderId = $orderId;
        $this->comment = $comment;
    }
    
    function initial(){
        $portalBizPaymentHistory = new PortalBizPaymentHistory();
        $this->order = $portalBizPaymentHistory->getOrderAllInformation($this->orderId);
    }
    
    function process()
    {
        $portal_model_status = new PortalModelOrderStatus();
        $portal_model_status->fk_order = $this->order->id;
        $portal_model_status->status = DatabaseFixedValue::ORDER_STATUS_FAIL_TO_DELIVER;
        $portal_model_status->comment = $this->comment;
        $portal_model_status->updated_user = $this->user->id;
        $portal_model_status->insert();
    }
    
}