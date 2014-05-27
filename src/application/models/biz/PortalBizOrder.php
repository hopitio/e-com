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
}