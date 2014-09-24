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
    protected $css = array('/style/portalOrder.css','/style/customerList.css');
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
        ->setJavascript(array('/js/controller/PortalOrderEmailVerifyingController.js'))
        ->setCss($this->css)
        ->render('portalPayment/orderEmailVerify');

    }
    
    /**
     * Hỗ trợ việc valid dữ liệu
     * @param string $username
     * @param string $password
     * @return bool
     */
    private function isValidLoginData($username,$password){
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $username) !== 1)
        {
            return false;
        }
    
        $case = preg_match('@[a-z0-9A-Z]@', $password);
        if(!$case || strlen($password) < 8) {
            return false;
        }
    
        return true;
    }
    
    function loginAndThen()
    {
        $email =  $this->input->post("email");
        $password =  $this->input->post("password");
        $orderId = $this->input->post('orderId');
        $invoiceId = $this->input->post('invoiceId');
        
        $isValid = $this->isValidLoginData($email, $password);
        $portalAccountBiz = new PortalBizAccount();
        $user = $portalAccountBiz->getLogin($email,$password);
        if (!$isValid || !isset($user))
        {
            $portalBizOrderHistory = new PortalBizPaymentHistory();
            $orderInformation = $portalBizOrderHistory->getOrderAllInformation($orderId);
            if($orderInformation == null){
                throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' Không tìm thấy order với key = '.$orderId);
            }
            
            $this->calutionForviewView($orderInformation,$invoiceId);
            
            $dataView = array();
            $dataView['loginError'] = true;
            $dataView['order'] = $orderInformation;
            $dataView['payment'] = $this->config->item('payment_gateway_supported');
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setJavascript(array("/cerulean/plugins/validation/jquery.validate.min.js"))
            ->setData($dataView)
            ->setJavascript(array('/js/controller/PortalOrderEmailVerifyingController.js'))
            ->setCss($this->css)
            ->render('portalPayment/orderEmailVerify');
            
        }else{
            //echo "<pre>"; var_dump($user); die;
            $this->obj_user =  $user;
            $this->obj_user->is_authorized = true;
            $this->obj_user->portal_id = $user->id;
            $this->set_obj_user_to_me($this->obj_user);
            redirect("portal/order_verifing/verify?o={$orderId}&i={$invoiceId}");
        }
        
    }
    
    
    function mergeEmail()
    {
        $orderId = $this->input->post('orderId');
        $invoiceId = $this->input->post('invoiceId');
        $isHave = $this->input->post("rbx-haveAccount");
        if($isHave == 'HAVE')
        {
            $this->loginAndThen();
            return;
        }
        
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