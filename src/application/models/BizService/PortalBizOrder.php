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
        $result = $portalmodelOrder->getOrderWithCurrentStatus(array($orderId));
        if(count($result) == 0 ) {
            return null;
        }
        $result = $result[0];
        $user = User::getCurrentUser();
        switch ($result->status)
        {
            case DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED:
               return $this->processShippingOrder($user, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_SHIPPING:
               return $this->processDelivered($user, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_VERIFYING:
               //var_dump($result->status);die;
               return $this->processPlaceOrder($user, $orderId, $comment);
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

    
    function processPlaceOrder($user, $orderId, $comment, $invoice = null){
        $status = $this->updateOrderToOrderPlace($user, $orderId, $comment);
        $this-> mailBuyer($orderId,null, MailManager::ORDER_PLACES);
        $this->mailSeller($orderId,null ,MailManager::SELLER_PAYMENT_VERIFIED);
        return $status;
    }
    
    function processVerifyOrder($user, $orderId, $comment, $invoiceId = null){
        $status = $this->updateOrderToVerify($user, $orderId, $comment);
        return $status;
    }
    
    function processShippingOrder($user, $orderId, $comment , $invoiceId = null)
    {
        $status = $this->updateOrderToShipping($user, $orderId, $comment);
        $this->mailBuyer($orderId , $invoiceId, MailManager::ORDER_SHIPPING);
        return $status;
    }
    
    function processDelivered($user, $orderId, $comment, $invoiceId = null){
        $status = $this->updateOrderToDelivered($user, $orderId, $comment);
        $this->mailBuyer($orderId , $invoiceId, MailManager::ORDER_DELIVERED);
        $this->mailSeller($orderId , $invoiceId, MailManager::SELLER_DELIVERED);
        return $status;
    }
    
    protected function updateOrderToVerify($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_VERIFYING;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    protected function updateOrderToShipping($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_SHIPPING;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = $portalModel->getDate();
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    protected function updateOrderToCancelled($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  $portalModel->getDate();
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    protected function updateOrderToDelivered($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_DELIVERED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = $portalModel->getDate();
        $portalModel->updateById();
        $invoices_repository  = new PortalModelInvoice();
        $invoices_repository->fk_order = $orderId;
        $results = $invoices_repository->getMutilCondition();
        if(!empty($results[0])){
            $invoice = $results[0];
            if(empty($invoice->paid_date)){
                $invoices_repository  = new PortalModelInvoice();
                $invoices_repository->id = $invoice->id;
                $invoices_repository->paid_date = $invoices_repository->getDate();
                $invoices_repository->updateById();
            } 
        }
        
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
        
    }
    
    protected function updateOrderToOrderPlace($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    protected function updateOrderToRejected($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_REJECTED;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  $portalModel->getDate();
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    protected function updateOrderToFailToDelivery($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_FAIL_TO_DELIVER;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = '';
        $portalModel->updateById();
        return $this->updateOrderStatus($userUpdate, $orderId, $status, $comment);
    }
    
    private function updateOrderStatus($userUpdate, $orderId, $status, $comment){
        $orderStatus = new PortalModelOrderStatus();
        $orderStatus->updated_date = $orderStatus->getDate();
        $orderStatus->updated_user = $userUpdate->id;
        $orderStatus->fk_order = $orderId;
        $orderStatus->status = $status;
        $orderStatus->comment = $comment;
        $orderStatus->id = $orderStatus->insert();
        return $orderStatus;
    }
    
    protected function mailBuyer($orderId,$invoiceId = null,$mailType)
    {
        $portalPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalPaymentHistory->getOrderAllInformation($orderId);
        $expectedInvoice = null;
        
        if($invoiceId == null){
            $expectedInvoice = $order->invoices[0];
        }else{
            foreach ($order->invoices as $invoice){
                if($invoice->id == $invoiceId){
                    $expectedInvoice = $invoice;
                }
            }
        }
        unset($order->invoices);
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                     "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        
        
        $order->invoice = $expectedInvoice;
        $repositoryUser = new PortalModelUser();
        $repositoryUser->id = $order->fk_user;
        $user = $repositoryUser->getOneById();
        $order->user = $user;
        
        //echo "<pre/>"; var_dump($order);die;
        
        $mailData = array();
        $mailData['order'] = $order;
        MailManager::initalAndSend($mailType, $user->account, $mailData);
    }
    
    protected function mailSeller($orderId,$invoiceId = null,$mailType){
        $portalPaymentHistory = new PortalBizPaymentHistory();
        $order = $portalPaymentHistory->getOrderAllInformation($orderId,true);
        $expectedInvoice = null;
        if($invoiceId == null){
            $expectedInvoice = $order->invoices[0];
        }else{
            foreach ($order->invoices as $invoice){
                if($invoice->id == $invoiceId){
                    $expectedInvoice = $invoice;
                }
            }
        }
        unset($order->invoices);
        
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        $order->invoice = $expectedInvoice;
        $sellerMail = array();
        foreach ($order->invoice->products as &$product){
            if($product->seller_email == null || !isset($product->seller_email)){
                $product->seller_email = 'lethanhan.bkaptech@gmail.com';
            }
            
            if(!array_key_exists($product->seller_email,$sellerMail)){
                $sellerMail[$product->seller_email] = $order;
            }
            
        }
        
        $mailData = array();
        foreach (array_keys($sellerMail) as $key)
        {
            $mailData['order'] = $sellerMail[$key];
            MailManager::initalAndSend($mailType, $key, $mailData);
        }
    }
    
}