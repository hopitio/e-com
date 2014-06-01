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
        $user = User::getCurrentUser();
        switch ($result->status)
        {
            case DatabaseFixedValue::ORDER_STATUS_VERIFYING:
               return $this->processShippingOrder($user, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_SHIPPING:
               return $this->processDelivered($user, $orderId, $comment);
            break;
            case DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED:
               return $this->processVerifyOrder($user, $orderId, $comment);
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
        $status = $this->updateOrderToVerify($user, $orderId, $comment);
        $this-> mailBuyer($orderId, MailManager::ORDER_PLACES);
        return $status;
    }
    
    function processVerifyOrder($user, $orderId, $comment, $invoiceId = null){
        $status = $this->updateOrderToVerify($user, $orderId, $comment);
        $this->mailSeller($orderId, MailManager::SELLER_PAYMENT_VERIFIED);
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
        $this->mailBuyer($orderId , $invoiceId, MailManager::ORDER_ASK_REVIEW);
        return $status;
    }
    
    function processCanncel($user, $orderId, $comment, $invoiceId = null){
        
    }
    
    function processRejected($user, $orderId, $comment, $invoiceId = null){
        
    }
    
    function processRefunedSomeProducts($user, $orderId, $product){
        
    }
    
    private function updateOrderToVerify($userUpdate, $orderId, $comment){
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
    
    private function updateOrderToShipping($userUpdate, $orderId, $comment){
        $status = DatabaseFixedValue::ORDER_STATUS_SHIPPING;
        $portalModel = new PortalModelOrder();
        $portalModel->id = $orderId;
        $portalModel->getOneById();
        $portalModel->canceled_date =  '';
        $portalModel->completed_date = '';
        $portalModel->shiped_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalModel->updateById();
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
        }
        unset($order->invoices);
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                     "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        
        $order->invoice = $expectedInvoice;
        foreach ($order->invoice->shippings as $shipping){
            if($shipping->status != DatabaseFixedValue::SHIPPING_STATUS_ACTIVE && $shipping->shipping_type != 'SHIP')
            {
                continue;
            }
            if($shipping->contact->email_contact == null || !isset($shipping->contact->email_contact)){
                $target = 'lethanhan.bkaptech@gmail.com';
            }else{
                $target = $shipping->contact->email_contact;
            }
            $mailData = array();
            $mailData['order'] = $order;
            MailManager::initalAndSend($mailType, $target, $mailData);
        }
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
        }
        unset($order->invoices);
        
        if($expectedInvoice == null){
            throw new Lynx_BusinessLogicException(
                __LINE__ . ' ' . __FILE__ . ' ' .
                "Dữ liệu order và invoice không khớp {$orderId} - {$invoiceId}");
        }
        $order->invoice = $expectedInvoice;
        $sellerMail = array();
        foreach ($order->invoice->products as $product){
            if(!array_key_exists($product->seller_email,$sellerMail)){
                if($product->seller_email == null || !isset($product->seller_email)){
                    $product->seller_email = 'lethanhan.bkaptech@gmail.com';
                }
                $sellerMail[$product->seller_email] = $order;
                continue;
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