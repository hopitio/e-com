<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice mà chưa thông qua login page.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderVerifing extends BasePortalController
{
    protected $authorization_required = FALSE;
    protected $css = array('/style/portalOrder.css');
    protected $js =  array();
    
    function getInformation()
    {
        $data = $this->input->post();
        $data = json_decode($data['order']);
        $tempId = $this->insertTempData();
        
        $paymentManager = new PortalPaymentManager();
        $tempData = $paymentManager->getPaymentByPaymentKey($tempId);
        
        $portalOrderData = $paymentManager->createNewOrder($data, $data->su,$data->secretKey);
        $tempData->order_id = $portalOrderData['orderId'];
        $paymentManager->updatePaymentTempToProcessed($tempData);
        
        if($data->user->is_authorized === true || $data->user->is_authorized == 'true')
        {
            redirect("portal/order_verifing/verify?o={$portalOrderData['orderId']}&i={$portalOrderData['invoiceId']}");
            return;
        }
        
        $orderId = $portalOrderData['orderId'];
        $invoiceId = $portalOrderData['invoiceId'];
        $portalBizOrderHistory = new PortalBizPaymentHistory();
        $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
        if($orderInformation == null){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
        }
        
        $this->calutionForviewView($orderInformation,$invoiceId);
        
        $dataView = array();
        $dataView['order'] = $orderInformation;
        $dataView['payment'] = $this->config->item('payment_gateway_supported');
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setJavascript(array("/cerulean/plugins/validation/jquery.validate.min.js"))
        ->setData($dataView)
        ->setCss($this->css)
        ->render('portalPayment/orderEmailVerify');

    }
    
    function mergeEmail()
    {
        $orderId = $this->input->post('orderId');
        $invoiceId = $this->input->post('invoiceId');
        $email = $this->input->post('email');
        
        $userRespository = new PortalModelUser();
        $userRespository->account = $email;
        $results = $userRespository->getMutilCondition();
        
        $userId = null;
        if(count($results) > 0){
            $userId = $results[0]->id;
        }else{
            $portalService = new PortalBizAccount();
            $userId = $portalService->insertNewUserNormal($this->obj_user, '', '', $email, '', 'M', '1970-01-01 00:00:00');
            
            $portalBizOrderHistory = new PortalBizPaymentHistory();
            $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
            $this->mergeContact($orderInformation,$userId);
            
        }
        
        $orderRespository = new PortalModelOrder();
        $orderRespository->fk_user = $userId;
        $orderRespository->id = $orderId;
        $orderRespository->updateById();
        
        redirect("portal/order_verifing/verify?o={$orderId}&i={$invoiceId}");
    }
    
    private function mergeContact($orderInformation, $userId){
        foreach ($orderInformation->invoices as $invoice){
            foreach ($invoice->shippings as $shipping){
                $userContactRespository = new PortalModelUserContact();
                $userContactRespository->id = $shipping->contact->id;
                $userContactRespository->fk_user = $userId;
                $userContactRespository->updateById();
                echo "<pre/>"; echo json_encode($shipping->contact);die;
            }
        }
    }
    
    private function insertTempData()
    {
        $data = $this->input->post();
        $paymentBiz = new PortalPaymentManager();
        $theKey  = $paymentBiz->insertTemp($data['order']);
        return $theKey;
    }
    
    private function calutionForviewView(&$orderInfor,$invoiceId){
        $invoice = null;
        foreach ($orderInfor->invoices as $invoiceItem){
            if($invoiceItem->id == $invoiceId){
                $invoice = $invoiceItem;
                break;
            }
        }
        unset($orderInfor->invoices);
        $orderInfor->invoice = $invoice;
    }
    
    

}