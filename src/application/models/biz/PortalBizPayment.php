<?php

/**
 * Xử lý các liên quan đến việc xử lý playment
 * @author ANLT
 * @since 20140426
 */
class PortalBizPayment extends PortalBizBase
{
    function paymentOrderComplete($orderId,$invoiceId,$paymentMethod)
    {
        $orderModel = new PortalModelOrder();
        $orderModel->id = $orderId;
        $orderModel->getOneById();
        
        $invocieModel = new PortalModelInvoice();
        $invocieModel->id = $invoiceId;
        $invocieModel->getOneById();
        
        $invocieModel->paid_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $invocieModel->payment_method = $paymentMethod;
        $invocieModel->updateById();
        
        $orderStatus = new PortalModelOrderStatus();
        $orderStatus->updated_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $orderStatus->updated_user = User::getCurrentUser()->id;
        $orderStatus->fk_order = $orderId;
        $orderStatus->status = DatabaseFixedValue::ORDER_STATUS_VERIFYING;
        $orderStatus->insert();
        
        return $orderStatus;
    }
    

}