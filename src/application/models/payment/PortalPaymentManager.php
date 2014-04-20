<?php
class PortalPaymentManager extends PortalBizPayment{
    
    /**
     * order information
     * @param unknown $orderInformation
     * @param unknown $subSystemKey
     * @return boolean
     */
    function createNewOrder($orderInformation,$subSystemKey = null,$secrectKey = null){
        $subSystemKey == null ? $this->config->item('sub_system_name')['default'] : $this->config->item('sub_system_name')[$subSystemKey];
        $orderId = $this->insertOrder($orderInformation);
        $products =  $orderInformation->products;
        $portalProducts = $this->saveProducts($products);
        $protalTax = $this->saveTax($portalProducts,$products);
        $contactInformation = '';
        $portalContactId = $this->insertContact($contactInformation);
        $order = '';
        $portalOrderId = $this->insertOrder($order,$subSystemKey);
        $invoiceId = $this->insertInvoice($portalOrderId);
        $invoiceProduct = $this->insertInvoiceProducts($invoiceId, $portalProducts);
        $shippingPostData = '';
        $invoiceShipping = $this->insertInvoiceShipping($invoiceId, $portalContactId, $shippingPostData);
        $otherCostData = '';
        $invoiceOtherCost = $this->insertOtherCosts($invoiceId,$otherCostData);
        $this->insertOrderStatus($portalOrderId,User::getCurrentUser()->id);
        $portalUserHistory = new PortalBizUserHistory();
        $portalUserHistory->createNewHistory(user::getCurrentUser(),DatabaseFixedValue::USER_HISTORY_ACTION_ORDER,'',$subSystemKey,$secrectKey);
        return $invoiceId;
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
        foreach ($objects as $obj)
        {
            $product = new PortalModelProduct();
            $product->name = $obj->name;
            $product->price = $obj->price;
            $product->quantity = $obj->quantity;
            $product->short_description = $obj->sortDes;
            $product->sub_id = $obj->id;
            $product->sub_image = $obj->image;
            $product->totalprice = $obj->totalPrices;
            $product->actual_price = $obj->actualPrice;
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
        foreach($products as $product){
            $portalModelTaxItem = new PortalModelTax();
            $portalModelTaxItem->sub_tax_name = 'dump';
            $portalModelTaxItem->sub_tax_id = 1;
            $portalModelTaxItem->sub_tax_value = 0.11;
            array_push($taxsData, $portalModelTaxItem);
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
         $portalOrder->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
         $portalOrder->created_user = $userId;
         $portalOrder->fk_user = $userId;
         $orderId = $portalOrder->insertNewOrder();
         return $orderId;
    }
    
    /**
     * insert new user contact
     * @param object $orderInformation
     * @param string $orderId
     */
    function insertContact($contactInformation){
        
        $userContact = array();
        if(isset($contactInformation->shipping)){
            $portalContactModel = new PortalModelUserContact();
            $portalContactModel->full_name = $contactInformation->shipping->fullname;
            $portalContactModel->telephone = $contactInformation->shipping->telephone;
            $portalContactModel->street_address = $contactInformation->shipping->streetAddress;
            $portalContactModel->city_district = $contactInformation->shipping->cityDistrict;
            $portalContactModel->state_province = $contactInformation->shipping->stateProvince;
            $portalContactModel->date_created = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
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
    private function insertInvoiceProducts($invoiceId,$products)
    {
        $invoiceProduct = new PortalModelInvoiceProduct();
        $invoiceProductsInsert = array();
        foreach ($products as $product)
        {
            $invoiceProductNew = new PortalModelInvoiceProduct();
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
    function insertInvoiceShipping($invoiceId,$userContacts,$contactPostData)
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
                    $shippingItem->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
                    $shippingItem->created_user = User::getCurrentUser()->id;
                    $shippingItem->fk_invoice = $invoiceId;
                    $shippingItem->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
                    $shippingItem->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_SHIP;
                    $shippingItem->price = $postDataShippingInformation->shippingPrices;
                    $shippingItem->display_name = $postDataShippingInformation->shippingDisplayName;
                    $shippingItem->sub_id = $postDataShippingInformation->shippingKey;
                break;
                case 'pay':
                    $shippingItem->fk_user_contact = $contactDetail;
                    $shippingItem->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
                    $shippingItem->created_user = User::getCurrentUser()->id;
                    $shippingItem->fk_invoice = $invoiceId;
                    $shippingItem->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
                    $shippingItem->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_PAY;
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
        return null;
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
        $paymentTemp->fk_user = $data->user->id;
        $paymentTemp->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
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
        $invoiceModel->created_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
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
        $paymentTempModel->processed_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
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
        $portalModelOrderStatus->status = DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED;
        $portalModelOrderStatus->updated_user = $userId;
        $portalModelOrderStatus->updated_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        return $portalModelOrderStatus->insert();
    }
    

}
