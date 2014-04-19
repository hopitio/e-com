<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class paymentChoice extends BaseController
{
    CONST TEMP_SESSION_KEY_ORDER = 'TEMP_SESSION_KEY_ORDER';
    protected $authorization_required = TRUE;
    
    function showPage(){
       $data = $this->session->userdata(self::TEMP_SESSION_KEY_ORDER);
       $this->session->unset_userdata(self::TEMP_SESSION_KEY_ORDER);
       if(!isset($data) || $data == null)
       {
            throw new Lynx_BusinessLogicException(__CLASS__.' '.__FUNCTION__. '  Sai dữ liệu payment' );
       }
       
       $paymentManager = new PortalPaymentManager();
       $tempData = $paymentManager->getPaymentByPaymentKey($data);
       $data = $tempData->data;
       $paymentManager->createNewOrder($data, $data->su);
       $paymentManager->updatePaymentTempToProcessed($tempData);
       
       $dataview = array();
       $dataview['order'] = $data;
       $dataview['user'] = User::getCurrentUser();
       $dataview['currency'] = $this->config->item('support_currency');
       $dataview['payment'] = $this->config->item('payment_gateway_supported');
       LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($dataview)->render('portalOrder/orderCheckinComplete');
    }
    
    function updateInvoice()
    {
        
    }
}