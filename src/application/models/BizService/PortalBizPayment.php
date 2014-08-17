<?php

/**
 * Xử lý các liên quan đến việc xử lý playment
 * @author ANLT
 * @since 20140426
 */
class PortalBizPayment extends PortalBizBase
{
    
   private function orderUpdateStatus($orderId,$invoiceId,$status){
       
       $orderStatus = new PortalModelOrderStatus();
       $orderStatus->updated_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
       $orderStatus->updated_user = User::getCurrentUser()->id;
       $orderStatus->fk_order = $orderId;
       $orderStatus->status = $status;
       $orderStatus->id = $orderStatus->insert();
       return $orderStatus;
   }
   
   function orderUpdateToshipping($isAdmin,$orderId,$invoiceId){
        //TODO: EMAIL.
        $orderModel = new PortalModelOrder();
        $orderModel->id = $orderId;
        $orderModel->getOneById();
        
        $orderStatus = $this->orderUpdateStatus($orderId, $invoiceId, DatabaseFixedValue::ORDER_STATUS_SHIPPING);
        $orderInfoWithStatus = $orderModel->getOrderWithCurrentStatus();
        return $orderInfoWithStatus;
   }
   
   function orderUpdateOrderToDelivery($isAdmin,$orderId,$invoiceId){
       $orderModel = new PortalModelOrder();
       $orderModel->id = $orderId;
       $orderModel->getOneById();
       
       $orderStatus = $this->orderUpdateStatus($orderId, $invoiceId, DatabaseFixedValue::ORDER_STATUS_DELIVERED);
       $orderInfoWithStatus = $orderModel->getOrderWithCurrentStatus();
       
       return $orderInfoWithStatus;
   }
   
   function updateOrderToOrderPlace($isAdmin,$orderId,$invoiceId){
       $orderModel = new PortalModelOrder();
       $orderModel->id = $orderId;
       $orderStatus = $this->orderUpdateStatus($orderId, $invoiceId, DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED);
       $orderInfoWithStatus = $orderModel->getOrderWithCurrentStatus();
       return $orderInfoWithStatus;
   }
   
   function updateOrderToCanncel($isAdmin,$orderId,$invoiceId){
       $orderModel = new PortalModelOrder();
       $orderModel->id = $orderId;
       $orderStatus = $this->orderUpdateStatus($orderId, $invoiceId, DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED);
       $orderInfoWithStatus = $orderModel->getOrderWithCurrentStatus();
       
       $invocieModel = new PortalModelInvoice();
       $invocieModel->id = $invoiceId;
       $invocieModel->getOneById();
       $invocieModel->cancelled_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
       
       return $orderInfoWithStatus;
   }
   
   function updateOrderToReject($isAdmin,$orderId,$invoiceId){
       $orderModel = new PortalModelOrder();
       $orderModel->id = $orderId;
       $orderStatus = $this->orderUpdateStatus($orderId, $invoiceId, DatabaseFixedValue::ORDER_STATUS_REJECTED);
       $orderInfoWithStatus = $orderModel->getOrderWithCurrentStatus();
       
       $invocieModel = new PortalModelInvoice();
       $invocieModel->id = $invoiceId;
       $invocieModel->getOneById();
        
       $invocieModel->rejected_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
       return $orderInfoWithStatus;
   }
   
   function updatePaymentMethod($invoiceId,$paymentId, $paymentMethod)
   {
       $invocieModel = new PortalModelInvoice();
       $invocieModel->id = $invoiceId;
       $invocieModel->getOneById();
       $invocieModel->payment_id = $paymentId;
       $invocieModel->paid_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
       $invocieModel->payment_method = $paymentMethod;
       return $invocieModel->updateById();
   }
   


}