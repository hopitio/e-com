<?php
class PortalPaymentManager extends PortalPaymentBiz{
    /**
     * order information
     * @param unknown $orderInformation
     * @param unknown $subSystemKey
     * @return boolean
     */
    function createNewOrder($orderInformation,$subSystemKey){
        $orderId = $this->insertOrder($orderInformation);
        
        $products =  $orderInformation->products;
        
        $this->saveProducts($products, $subSystemKey, $orderId);
        
        $this->insertContact($orderInformation, $orderId);
        
        $this->insertShipping($orderInformation, $orderId);
        
        return true;
    }
    
    /**
     * save all product to database
     * @param array $products
     * @param string $subSystemKey
     * @param string $orderId
     */
    function saveProducts($products,$subSystemKey,$orderId)
    {
        $productsModel = new PortalOrderProductModel();
        $orderProducts = array();
        
        foreach ($products as $product)
        {
            $productModel = new PortalOrderProductModel();
            $productModel->fk_order = $orderId;
            $productModel->actual_price = $product->actualPrice;
            $productModel->price = $product->price;
            $productModel->product_image = $product->image;
            $productModel->product_name = $product->name;
            $productModel->quantity = $product->quantity;
            $productModel->short_description = $product->shortDesc;
            if(!isset($this->config->item('sub_system_name')[$subSystemKey])){
                throw new Lynx_BusinessLogicException(__CLASS__. ' ' . __FUNCTION__.' hệ thống không hỗ trợ sub system này');
            }
            $productModel->sub_id = $product->id;
            $productModel->sub_key = $this->config->item('sub_system_name')[$subSystemKey]; 
            $productModel->total_price = $product->totalPrice;
            array_push($orderProducts, $productModel);
        }
        
        return $productsModel->insertBacthOrdeProduct($orderProducts);
    }
    
    /**
     * Object insert new order.
     * @param object $orderInformation
     */
    function insertOrder($orderInformation)
    {
         $userId = User::getCurrentUser()->id;
         $portalOrder = new PortalOrderModel();
         $portalOrder->fk_customer =  $userId ;
         $orderId = $portalOrder->insertNewOrder();
         
         $portalOrderStatusHistoryModel = new PortalOrderStatusHistoryModel();
         $portalOrderStatusHistoryModel->fk_order = $orderId;
         $portalOrderStatusHistoryModel->fk_creator = $userId;
         $portalOrderStatusHistoryModel->fk_status = 1;//Hard code for ID.
         $portalOrderStatusHistoryModel->date_created = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
         $portalOrderStatusHistoryModel->is_mail_sent = 0;
         $portalOrderStatusHistoryModel->insertNewHistory();

         
         return $orderId;
    }
    
    /**
     * insert new user contact
     * @param object $orderInformation
     * @param string $orderId
     */
    function insertContact($orderInformation,$orderId){
        $portaluserContact = new PortalUserContactModel();
        $portaluserContact->firstname = User::getCurrentUser()->firstname;
        $portaluserContact->lastname = User::getCurrentUser()->firstname;
        $userContactId = $portaluserContact->insertNewContact();
        
        $portalPayOrderContact = new PortalOrderContactModel();
        $portalPayOrderContact->fk_order = $orderId;
        $portalPayOrderContact->fk_user_contact = $userContactId;
        $portalPayOrderContact->contact_status = DatabaseFixedValue::ORDER_CONTACT_STATUS_PAY;
        
        $portalShipOrderContact = new PortalOrderContactModel();
        $portalShipOrderContact->fk_order = $orderId;
        $portalShipOrderContact->fk_user_contact = $userContactId;
        $portalShipOrderContact->contact_status = DatabaseFixedValue::ORDER_CONTACT_STATUS_SHIPPING;
        
        $portalOrderContact = new PortalOrderContactModel();
        $result = $portalOrderContact->bachInsertContact(array($portalPayOrderContact,$portalShipOrderContact));
        return  $result;
    }
    
    function insertShipping($orderInformation,$orderId)
    {
        $portalOrderShipping = new PortalOrderShippingModel();
        $portalOrderShipping->fk_order = $orderId;
        $portalOrderShipping->shipping_display_name = $orderInformation->shipping->shippingDisplayName;
        $portalOrderShipping->shipping_price = $orderInformation->shipping->shippingPrice;
        $portalOrderShipping->sub_id = $orderInformation->shipping->shippingKey;
        if(!isset($this->config->item('sub_system_name')[$orderInformation->su])){
            throw new Lynx_BusinessLogicException(__CLASS__. '' . __FUNCTION__.' hệ thống không hỗ trợ sub system này');
        }
        $portalOrderShipping->sub_key = $this->config->item('sub_system_name')[$orderInformation->su];
        
        return $portalOrderShipping->insertNewShipping();
    } 

}
