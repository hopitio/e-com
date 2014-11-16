<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class addInvoice extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalAdminAddInvoiceController.js',
        '/js/services/PortalAdminAddInvoiceServiceClient.js',
        '/js/services/PortalAdminOrderServiceClient.js'
    );
    
    function showPage($orderId)
    {
        $portalmodelOrder = new PortalModelOrder();
        $data = array();
        $paymentHistory = new PortalBizPaymentHistory();
        $order = $paymentHistory->getOrderAllInformation($orderId);
        $data['order'] = $order;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData($data,false)
        ->setJavascript($this->js)
        ->render('portalAdmin/addInvoice');
    }
    
    function add($orderId)
    {
        $data = json_decode($this->input->post('data'));
        $orderManager = new PortalOrderManager();
        $dateTime = DateTime::createFromFormat ( 'd/m/Y', $data->invoice->paiedDate );
        $paidedDate = null;
        if($dateTime !== false){
            $paidedDate = $dateTime->format('Y-m-d');
        }
        $orderManager->addNewInvoice ( $this->obj_user, 
                                        $orderId, 
                                        $data->invoice->invoiceType->value, 
                                        $data->products, 
                                        $data->contact, 
                                        $data->otherCosts, 
                                        $data->comment,
                                        $paidedDate,
                                        $data->invoice->nlCode );
        redirect("/portal/__admin/order/{$orderId}");
    }
}
