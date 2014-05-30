<?php

/**
 * @author ANLT
 * @since 20140429
 */
class PortalBizOrder extends PortalBizBase
{
    function nextUpdateStatus($orderId, $comment){
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $result = $portalmodelOrder->getOrderWithCurrentStatus();
        
        if(count($result) == 0 ) {
            return null;
        }
        $result = $result[0];
        $userUpdate = User::getCurrentUser();
        log_message('error',var_export($userUpdate,true));
        switch ($result->status)
        {
            case DatabaseFixedValue::ORDER_STATUS_VERIFYING:
               return $this->updateOrderToShipping($userUpdate, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_SHIPPING:
                return $this->updateOrderToDelivered($userUpdate, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED:
                return $this->updateOrderToVerify($userUpdate, $orderId, $comment, true);
            break;
            default:
                return null;
            break;
        }
    }
    
    function backOrderStatus($orderId, $comment){
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $result = $portalmodelOrder->getOrderWithCurrentStatus();
        if(count($result) == 0 ) {
            return null;
        }
        $result = $result[0];
        $userUpdate = User::getCurrentUser();
        switch ($result->status)
        {
        	case DatabaseFixedValue::ORDER_STATUS_VERIFYING:
        	    return $this->updateOrderToOrderPlace($userUpdate, $orderId, $comment);
        	    break;
        	case DatabaseFixedValue::ORDER_STATUS_SHIPPING:
        	    return $this->updateOrderToVerify($userUpdate, $orderId, $comment, true);
        	    break;
        	case DatabaseFixedValue::ORDER_STATUS_DELIVERED:
        	    return $this->updateOrderToShipping($userUpdate, $orderId, $comment);
        	    break;
            case DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED:
                return $this->updateOrderToVerify($userUpdate, $orderId, $comment, true);
                break;
            case DatabaseFixedValue::ORDER_STATUS_REJECTED:
                return $this->updateOrderToVerify($userUpdate, $orderId, $comment, true);
                break;
        	default:
        	    return null;
        	    break;
        }
    }
    
    function rejectOrder($orderId, $comment){
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $result = $portalmodelOrder->getOrderWithCurrentStatus();
        if(count($result) == 0 ) {
            return null;
        }
        $result = $result[0];
        if($result->status  == DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED || 
           $result->status  == DatabaseFixedValue::ORDER_STATUS_DELIVERED){
            return null;
        }
        $userUpdate = User::getCurrentUser();
        return $this->updateOrderToRejected($userUpdate, $orderId, $comment);
    }
    
    function cancelOrder($orderId,$comment){
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $result = $portalmodelOrder->getOrderWithCurrentStatus();
        if(count($result) == 0 ) {
            return null;
        }
        $result = $result[0];
        if($result->status  == DatabaseFixedValue::ORDER_STATUS_REJECTED ||
            $result->status  == DatabaseFixedValue::ORDER_STATUS_DELIVERED){
            return null;
        }
        $userUpdate = User::getCurrentUser();
        return $this->updateOrderToCancelled($userUpdate, $orderId, $comment);
    }
    
    private function updateOrderToVerify($userUpdate, $orderId, $comment, $isSendMail){
        $status = DatabaseFixedValue::ORDER_STATUS_VERIFYING;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        //TODO: SEND MAIL.
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderToShipping($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_SHIPPING;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->updateById();

        //TODO: SEND MAIL.
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderToCancelled($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        
        //TODO: SEND MAIL.
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderToDelivered($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_DELIVERED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->updateById();
        //TODO: SEND MAIL.
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderToOrderPlace($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        //TODO: SEND MAIL.
        
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderToRejected($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_REJECTED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        //TODO: SEND MAIL.
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderStatus($userUpdate, $orderId, $status, $comment){
        $orderStatus = new PortalModelOrderStatus();
        $orderStatus->updated_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $orderStatus->updated_user = $userUpdate->id;
        $orderStatus->fk_order = $orderId;
        $orderStatus->status = $status;
        $orderStatus->comment = $comment;
        $orderStatus->id = $orderStatus->insert();
        return $orderStatus;
    }
    
    private function mailBuyer($orderId,$invoiceId = null,$mailType)
    {
        $portalPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalPaymentHistory->getOrderAllInformation($orderId);
        $expectedInvoice = null;
        if($invoiceId == null){
            $expectedInvoice = $order->invoices[0];
        }else{
            foreach ($order->invoices as $invoice){
                if($order->invoices>id == $invoiceId){
                    $expectedInvoice = $invoice;
                }
            }
            unset($order->invoices);
        }
        
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                     "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        $order->invoice = $expectedInvoice;
        $target = 'lethanhan.bkaptech@gmail.com'; //TODO: cần confirm địa chỉ.
        $mailData = array();
        $mailData['order'] = $order;
        $mailData['userContact'] = $order; //TODO: cần confirm địa chỉ.
        MailManager::initalAndSend($mailType, $target, $mailData);
    }
    
    private function mailSeller($orderId,$invoiceId = null,$mailType){
        $portalPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalPaymentHistory->getOrderAllInformation($orderId);
        $expectedInvoice = null;
        if($invoiceId == null){
            $expectedInvoice = $order->invoices[0];
        }else{
            foreach ($order->invoices as $invoice){
                if($order->invoices>id == $invoiceId){
                    $expectedInvoice = $invoice;
                }
            }
            unset($order->invoices);
        }
        
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        $order->invoice = $expectedInvoice;
        $sellerMail = array();
        foreach ($order->invocie->products as $product){
            if(array_key_exists($product->seller_email,$sellerMail)){
                $sellerMail[$product->seller_email] = array($product);
                continue;
            }
            else{
                array_push($sellerMail[$product->seller_email],$product);
            }
        }  
        foreach (array_keys($sellerMail) as $key)
        {
            $mailData = $sellerMail[$key];
            MailManager::initalAndSend(MailManager::SELLER_VERIFYING, $key, $mailData);
        }
    }
    
}