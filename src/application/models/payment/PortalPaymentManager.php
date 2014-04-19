<?php
class PortalPaymentManager extends PortalBizPayment{
    /**
     * order information
     * @param unknown $orderInformation
     * @param unknown $subSystemKey
     * @return boolean
     */
    function createNewOrder($orderInformation,$subSystemKey){
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
            $product->price = $obj->name;
            $product->quantity = $obj->name;
            $product->short_description = $obj->name;
            $product->sub_id = $obj->name;
            $product->sub_image = $obj->name;
            $product->totalprice = $obj->name;
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
        $portalContactModel = new PortalModelUserContact();
        $contactId = $portalContactModel->insertNewContact();
        return  null;
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
    function insertInvoiceShipping($invoiceId,$shippingData,$shippingPostData)
    {
        $shiping = new PortalModelInvoiceShipping();
        
        return null;
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
        $paymentTemp->ip_address = $session[];
        $paymentTemp->session_id = $session[];
        $paymentTemp->user_agrent = $session[];
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
        $paymentTempModel->updateById();
    }
    

}
