<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderNewController extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalAdminOrderNewController.js',
        "/js/date_function.js"
    );
    
    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderNew');
    }
    
    function save(){
        $jsonData = $this->input->post("post-data");
        $data = json_decode($jsonData);
        $userId = $this->saveUser($data);
        $orderId = $this->saveOrder($data, $userId);
        $invoiceId = $this->saveInvoice($data, $orderId);
        $this->saveOtherCost($data, $invoiceId);
        $this->saveProducts($data, $invoiceId);
        $this->saveShippingAddress($data, $invoiceId, $userId);
        $this->savePaymentAddress($data, $invoiceId, $userId);
        $this->insertOrderStatus($orderId);
        redirect("/portal/__admin/order/{$orderId}");
    }
    
    function insertOrderStatus($orderId){
        $orderStatus = new PortalModelOrderStatus();
        $orderStatus->fk_order = $orderId;
        $orderStatus->status = DatabaseFixedValue::ORDER_STATUS_VERIFYING;
        $orderStatus->updated_date = $orderStatus->getDate();
        $orderStatus->insert();
    }
    
    function saveUser($data){
        $user = $data->orderInformation->user;
        $userRepository = new PortalModelUser();
        $userRepository->account = $user;
        $results = $userRepository->getMutilCondition();
        $userId = null;
        if(count($results) > 0){
            $userId = $results[0]->id;
        }else{
            $userRepository->date_joined = $userRepository->getDate();
            $userId = $userRepository->insert();
        }
        return $userId;
    }
    
    function saveOrder($data,$userId){
        $order = new PortalModelOrder();
        $order->fk_user = $userId;
        $order->created_date = $order->getDate();
        $order->created_user = $this->obj_user->id;
        return $order->insert();
    }
    
    function saveInvoice($data, $orderId){
        $invoice = new PortalModelInvoice();
        $invoice->fk_order = $orderId;
        $invoice->comment = $data->invoiceInformation->comment;
        $invoice->created_date = $invoice->getDate();
        $invoice->created_user = $this->obj_user->id;
        $invoice->invoice_type = DatabaseFixedValue::INVOICE_TYPE_INPUT;
        return $invoice->insert();
    }
    
    function saveOtherCost($data, $invoiceId){
        foreach ($data->otherCosts as $otherCost){
            $othercost = new PortalModelInvoiceOtherCost();
            $othercost->value = $otherCost->prices;
            $othercost->comment = $otherCost->description;
            $othercost->fk_invoice = $invoiceId;
            $othercost->insert();
        }
    }
    
    function saveProducts($data, $invoiceId){
        foreach ($data->products as $product){
            $newProduct = new PortalModelProduct();
            $newProduct->sub_id =  $product->subId;
            $newProduct->name = $product->name;
            $newProduct->sub_image = $product->subImage;
            $newProduct->short_description = $product->shortDescription;
            $newProduct->sell_price = $product->sellPrice;
            $newProduct->product_url = $product->productUrl;
            $newProduct->seller_email = $product->sellerEmail;
            $newProduct->seller_name = $product->sellerName;
            $productId = $newProduct->insert();
            
            $invoiceProduct = new PortalModelInvoiceProduct();
            $invoiceProduct->fk_invoice = $invoiceId;
            $invoiceProduct->fk_product = $productId;
            $invoiceProduct->product_price = $product->productPrices;
            $invoiceProduct->product_quantity = $product->productQuantity;
            $invoiceProduct->insert();
        }
    }
    
    function saveShippingAddress($data, $invoiceId, $userId){
        $userContact = new PortalModelUserContact();
        $userContact->fk_user = $userId;
        $userContact->date_created = $userContact->getDate();
        $userContact->full_name = $data->invoiceInformation->shipping->fullName;
        $userContact->telephone = $data->invoiceInformation->shipping->telephone;
        $userContact->state_province = $data->invoiceInformation->shipping->stateProvince;
        $userContact->city_district = $data->invoiceInformation->shipping->city;
        $userContact->street_address = $data->invoiceInformation->shipping->streetAddress;
        $contactId = $userContact->insert();
        
        $invoiceShipping = new PortalModelInvoiceShipping();
        $invoiceShipping->fk_user_contact = $contactId;
        $invoiceShipping->fk_invoice = $invoiceId;
        $invoiceShipping->created_date = $invoiceShipping->getDate();
        $invoiceShipping->created_user = $this->obj_user->id;
        $invoiceShipping->display_name = $data->invoiceInformation->shippingMethodName;
        $invoiceShipping->estimated_max = $data->invoiceInformation->estimateMax;
        $invoiceShipping->estimated_min = $data->invoiceInformation->estimateMin;
        $invoiceShipping->price = $data->invoiceInformation->shippingPrice;
        $invoiceShipping->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_SHIP;
        $invoiceShipping->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
        $invoiceShipping->insert();
        
    }
    
    function savePaymentAddress($data, $invoiceId, $userId){
        if($data->invoiceInformation->shippingAddressOnly){
            return;
        }
        $userContact = new PortalModelUserContact();
        $userContact->fk_user = $userId;
        $userContact->date_created = $userContact->getDate();
        $userContact->full_name = $data->invoiceInformation->payAddress->fullName;
        $userContact->telephone = $data->invoiceInformation->payAddress->telephone;
        $userContact->state_province = $data->invoiceInformation->payAddress->stateProvince;
        $userContact->city_district = $data->invoiceInformation->payAddress->city;
        $userContact->street_address = $data->invoiceInformation->payAddress->streetAddress;
        $contactId = $userContact->insert();
        
        $invoiceShipping = new PortalModelInvoiceShipping();
        $invoiceShipping->fk_user_contact = $contactId;
        $invoiceShipping->fk_invoice = $invoiceId;
        $invoiceShipping->created_date = $invoiceShipping->getDate();
        $invoiceShipping->created_user = $this->obj_user->id;
        $invoiceShipping->display_name = $data->invoiceInformation->shippingMethodName;
        $invoiceShipping->estimated_max = $data->invoiceInformation->estimateMax;
        $invoiceShipping->estimated_min = $data->invoiceInformation->estimateMin;
        $invoiceShipping->price = 0;
        $invoiceShipping->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_PAY;
        $invoiceShipping->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
        $invoiceShipping->insert();
    }

}
