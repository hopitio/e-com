<?php
class PortalOrderInvoice
{

    protected  $orderId;
    protected  $comment;
    protected  $products;
    protected  $otherCosts;
    protected  $contact;
    protected  $user;
    protected  $paidedDate;
    protected  $nlCode;
    function __construct($user,$orderId,$products,$contact,$otherCosts,$comment,$paidedDate,$nlCode){
        $this->user = $user;
        $this->orderId = $orderId;
        $this->products = $products;
        $this->otherCosts = $otherCosts;
        $this->contact = $contact;
        $this->comment = $comment;
        $this->paidedDate = $paidedDate;
        $this->nlCode = $nlCode;
    }
    
    function process($orderId, $invoiceType){
        $portalInvoice = new PortalModelInvoice();
        $portalInvoice->invoice_type = $invoiceType;
        $portalInvoice->comment = $this->comment;
        $portalInvoice->created_date = $portalInvoice->getDate();
        $portalInvoice->fk_order = $orderId;
        $portalInvoice->created_user = $this->user->id;
        $portalInvoice->payment_id = $this->nlCode;
        $portalInvoice->paid_date = $this->paidedDate;
        $invoiceId = $portalInvoice->insert();
        $this->saveInvoiceProduct($invoiceId);
        $this->saveOtherCost($invoiceId);
        $this->save_contact($this->contact);
        $this->shipping($invoiceId);
        
        return $invoiceId;
    }
    
    function saveInvoiceProduct($invoiceId){
        foreach ($this->products as $product){
            if(!$product->choiced) continue;
            $portalInvoiceProduct = new PortalModelInvoiceProduct();
            $portalInvoiceProduct->fk_product = $product->id;
            $portalInvoiceProduct->fk_invoice = $invoiceId;
            $portalInvoiceProduct->product_price = $product->refuned_price;
            $portalInvoiceProduct->product_quantity = $product->refuned_quantity;
            $portalInvoiceProduct->insert();
        }
    }
    
    function saveOtherCost ($invoiceId){
        foreach ($this->otherCosts as $cost){
            $portalInvoiceOtherCost = new PortalModelInvoiceOtherCost();
            $portalInvoiceOtherCost->fk_invoice = $invoiceId;
            $portalInvoiceOtherCost->value = $cost->prices;
            $portalInvoiceOtherCost->comment = $cost->comment;
            $portalInvoiceOtherCost->insert();
        }
    }
    
    function save_contact(&$contact){
        //var_dump($contact);die;
        if($contact->id != 'new'){
            return $contact->id;
        }else{
            $contact_repository = new PortalModelUserContact();
            $contact_repository->fk_user = $contact->fk_user;
            $contact_repository->full_name = $contact->full_name;
            $contact_repository->telephone = $contact->telephone;
            $contact_repository->street_address = $contact->street_address;
            $contact_repository->city_district = $contact->city_district;
            $contact_repository->state_province = $contact->state_province;
            $contact_repository->email_contact = $contact->email_contact;
            $contact->id = $contact_repository->insert();
            return $contact->id;
        }
        
    }
    
    function shipping($invoiceId)
    {
        $portalInvoiceShipping = new PortalModelInvoiceShipping();
        $portalInvoiceShipping->fk_invoice = $invoiceId;
        $portalInvoiceShipping->fk_user_contact = $this->contact->id;
        $portalInvoiceShipping->price = $this->contact->prices;
        $portalInvoiceShipping->created_user = $this->user->id;
        $portalInvoiceShipping->created_date = $portalInvoiceShipping->getDate();
        $portalInvoiceShipping->status = DatabaseFixedValue::SHIPPING_STATUS_ACTIVE;
        $portalInvoiceShipping->shipping_type = DatabaseFixedValue::SHIPPING_TYPE_PAY;
        $portalInvoiceShipping->insert();
    }
    
}