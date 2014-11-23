<?php
class PortalPaymentManager extends PortalBizPayment{
    
    /**
     * order information
     * @param unknown $orderInformation
     * @param unknown $subSystemKey
     * @return boolean
     */
    function createNewOrder($orderInformation,$subSystemKey = null,$secrectKey = null){
        
        
        $subSystemName =  $this->config->item('sub_system_name');
        $subSystemKey == null ? $subSystemName['default'] : $subSystemName[$subSystemKey];
        $portalOrderId = $this->insertOrder($orderInformation,$subSystemKey);
        
        $products =  $orderInformation->products;
        $portalProducts = $this->saveProducts($products);
//         $protalTax = $this->saveTax($portalProducts,$products);
        
        $contactInformation = $orderInformation->addresses;
        $portalContactIds = $this->insertContact($contactInformation);
        
        $invoiceId = $this->insertInvoice($portalOrderId);
        $invoiceProduct = $this->insertInvoiceProducts($invoiceId, $portalProducts ,$products);
        
        $contactInformationPostData = $orderInformation->addresses;
        $shippingPostData = $orderInformation->shipping[0];
        $invoiceShipping = $this->insertInvoiceShipping($invoiceId, $portalContactIds, $contactInformationPostData, $shippingPostData);
        
        
        $otherCostData = null;
        $invoiceOtherCost = $this->insertOtherCosts($invoiceId,$otherCostData);
        $this->insertOrderStatus($portalOrderId,User::getCurrentUser()->id);
        $portalUserHistory = new PortalBizUserHistory();
        $portalUserHistory->createNewHistory(user::getCurrentUser(),DatabaseFixedValue::USER_HISTORY_ACTION_ORDER,'',$subSystemKey,$secrectKey);
        $returndata = array(
            'invoiceId' => $invoiceId,
            'orderId' => $portalOrderId
            );
        return $returndata;
    }
    
    /**
     * save all product to database
     * @param array $products
     * @param string $subSystemKey
     * @param string $orderId
     * @return array.
     */
    private function saveProducts($products)
    {
        $productsModel = new PortalModelProduct();
        $objects = array();
        foreach ($products as $obj)
        {
            $product = new PortalModelProduct();
            $product->name = $obj->name;
            $product->price = $obj->price;
            $product->short_description = $obj->shortDesc;
            $product->sub_id = $obj->id;
            $product->sub_image = $obj->image;
            $product->sell_price = $obj->price;
            $product->seller_id = $obj->sid;
            $product->seller_name = $obj->sellerName;
            $product->seller_email = $obj->sellerEmail;
            $product->shipping = $obj->shipping;
            array_push($objects, $product);
        }
        $returnValue = $productsModel->bacthInsert($objects);
        
        return $returnValue;
    }
    
    /**
     * 
     * @param array $products
     * @param array $postDataProducts
     */
    private function saveTax($products,$postDataProducts){
        $portalModelTax = new PortalModelTax();
        $taxsData = array();
        foreach($postDataProducts as $product){
            foreach ($products as $portalProduct){
                if($portalProduct->sub_id == $product->id){
                    foreach ($product->taxes as $tax){
                        $portalModelTaxItem = new PortalModelTax();
                        $portalModelTaxItem->fk_product = $portalProduct->id;
                        $portalModelTaxItem->sub_tax_name = $tax->name;
                        $portalModelTaxItem->sub_tax_value = $tax->totalTax;
                        array_push($taxsData, $portalModelTaxItem);
                    }
                }
                
            }
            
        }
        $returnValueTax = $portalModelTax->bacthInsert($taxsData);
        return $taxsData;
    }
    
    /**
     * Object insert new order.
     * @param object $orderInformation
     */
    private function insertOrder($orderInformation,$subKey)
    {
         $userId = User::getCurrentUser()->id;
         $portalOrder = new PortalModelOrder();
         $portalOrder->sub_key = $subKey;
         $portalOrder->created_date = $portalOrder->getDate();
         $portalOrder->created_user = $userId;
         $portalOrder->fk_user = $userId;
         $orderId = $portalOrder->insert();
         return $orderId;
    }
    
    /**
     * insert new user contact
     * @param object $orderInformation
     * @param string $orderId
     */
    function insertContact($contactInformation){
        $userId = User::getCurrentUser()->id;
        $userContact = array();
        if(isset($contactInformation->shipping)){
            $portalContactModel = new PortalModelUserContact();
            $portalContactModel->full_name = $contactInformation->shipping->fullname;
            $portalContactModel->telephone = $contactInformation->shipping->telephone;
            $portalContactModel->street_address = $contactInformation->shipping->streetAddress;
            $portalContactModel->state_province = implode(',' ,   $contactInformation->shipping->stateProvince);
            $portalContactModel->date_created = $portalContactModel->getDate();
            $portalContactModel->fk_user = $userId;
            $contactId = $portalContactModel->insert();
            $userContact['shipping'] = $contactId;
        }  
        return  $userContact;
    }
    /**
     * 
     * @param string $invoiceId
     * @param array $products
     */
    private function insertInvoiceProducts($invoiceId,$products,$requestProducts)
    {
        $invoiceProduct = new PortalModelInvoiceProduct();
        $invoiceProductsInsert = array();
        foreach ($products as $product)
        {
            $invoiceProductNew = new PortalModelInvoiceProduct();
            foreach ($requestProducts as $requestProduct)
            {
                if($requestProduct->id == $product->sub_id){
                    $invoiceProductNew->product_price = $requestProduct->actualPrice;
                    $invoiceProductNew->product_quantity = $requestProduct->quantity;
                }
            }
            $invoiceProductNew->fk_product = $product->id;
            $invoiceProductNew->fk_invoice = $invoiceId;
            
            array_push($invoiceProductsInsert, $invoiceProductNew);
        }
        return $invoiceProduct->bacthInsert($invoiceProductsInsert);
    }
    
    /**
     * 
     * @param string $invoiceId
     * @param array $shippingData
     * @param array $shippingPostData
     * @return NULL
     */
    function insertInvoiceShipping($invoiceId,$userContacts,$contactPostData,$shippingInformation)
    {
        $shiping = new PortalModelInvoiceShipping();
        $postDataShippingInformation = $contactPostData->shipping;
        $arrayShippingDetails = array();
        foreach ($userContacts as $contactType => $contactDetail)
        {
            $shippingItem = new PortalModelInvoiceShipping();
            switch($contactType)
            {
                case 'shipping' :
                    $shippingItem->fk_user_contact = $contactDetail;
                    $shippingItem->created_date = $shippingItem->getDate();
                    $shippingItem->created_user = User::getCurrentUser()->id;
                    $shippingItem->fk_invoice = $invoiceId;
                    $shippingItem->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
                    $shippingItem->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_SHIP;
                    $shippingItem->price = $shippingInformation->shippingPrice;
                    $shippingItem->display_name = $shippingInformation->shippingDisplayName;
                    $shippingItem->sub_id = $shippingInformation->shippingKey;
                    $shippingItem->estimated_max = $shippingInformation->estimateDateMax;
                    $shippingItem->estimated_min = $shippingInformation->estimateDateMin;
                break;
                case 'pay':
                    $shippingItem->fk_user_contact = $contactDetail;
                    $shippingItem->created_date = $shippingItem->getDate();
                    $shippingItem->created_user = User::getCurrentUser()->id;
                    $shippingItem->fk_invoice = $invoiceId;
                    $shippingItem->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
                    $shippingItem->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_PAY;
                    $shippingItem->price = $shippingInformation->shippingPrice;
                    $shippingItem->display_name = $shippingInformation->shippingDisplayName;
                    $shippingItem->sub_id = $shippingInformation->shippingKey;
                    $shippingItem->estimated_max = $shippingInformation->estimateDateMax;
                    $shippingItem->estimated_min = $shippingInformation->estimateDateMin;
                    break;
                default:
                    continue;
                break;
            }
            
            if(isset($shippingItem->created_date)){
                array_push($arrayShippingDetails, $shippingItem);
            }
        }
        return $shiping->bacthInsert($arrayShippingDetails);
    } 
    
    /**
     * Insert Other cost
     * @return NULL
     */
    private function insertOtherCosts($invoiceId,$otherCostCollection){
        $portalModelOtherCost = new PortalModelInvoiceOtherCost();
        if($otherCostCollection == null){
            return null;
        }
    }
    /**
     * return temp key
     * @param string order post data (json)
     */
    function insertTemp($data)
    {
        $session = get_instance()->session->all_userdata();
        $dataDecoded = json_decode($data);
        $paymentTemp = new PortalModelPaymentTemp();
        $paymentTemp->data = $data;
        $paymentTemp->fk_user = $dataDecoded->user->id;
        $paymentTemp->created_date = $paymentTemp->getDate();
        $paymentTemp->ip_address = $session['ip_address'];
        $paymentTemp->session_id = $session['session_id'];
        $paymentTemp->user_agrent = $session['user_agent'];
        return $paymentTemp->insert();
    }
    
    /**
     * Lấy dữ liệu payment bởi payment key.
     * @param string $paymentKey
     * @return PortalModelPaymentTemp
     */
    function getPaymentByPaymentKey($paymentKey){
        $portalPaymetModel = new PortalModelPaymentTemp();
        $portalPaymetModel->id = $paymentKey;
        $portalPaymetModel->getOneById();
        return $portalPaymetModel;
    }
    
    private function insertInvoice($orderId)
    {
        $invoiceModel = new PortalModelInvoice();
        $invoiceModel->fk_order = $orderId;
        $invoiceModel->created_date = $invoiceModel->getDate();
        $invoiceModel->created_user = User::getCurrentUser()->id;
        $invoiceModel->invoice_type = DatabaseFixedValue::INVOICE_TYPE_INPUT;
        $invoiceId = $invoiceModel->insert();
        return $invoiceId;
    }
    /**
     * 
     * @param PortalModelPaymentTemp $paymentTempModel
     */
    public function updatePaymentTempToProcessed($paymentTempModel)
    {
        $paymentTempModel->processed_date = $paymentTempModel->getDate();
        return $paymentTempModel->updateById();
        
    }
    
    /**
     * 
     * @param unknown $orderId
     * @param unknown $userId
     */
    public function insertOrderStatus($orderId,$userId)
    {
        $portalModelOrderStatus = new PortalModelOrderStatus();
        $portalModelOrderStatus->status = DatabaseFixedValue::ORDER_STATUS_VERIFYING;
        $portalModelOrderStatus->fk_order = $orderId;
        $portalModelOrderStatus->updated_user = $userId;
        $portalModelOrderStatus->updated_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        return $portalModelOrderStatus->insert();
    }
    

}
