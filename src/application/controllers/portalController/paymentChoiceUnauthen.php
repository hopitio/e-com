<?php
require_once APPPATH.'controllers/portalController/paymentChoice.php';
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý payment choice mà chưa thông qua login page.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class paymentChoiceUnauthen extends paymentChoice
{
    protected $authorization_required = FALSE;
    
    function getInformation()
    {
        $data = $this->input->post();
        $data = json_decode($data['order']);
        $this->buildInformation();
        if(isset($data->secretKey) && isset($data->user)){
            if(!empty($data->secretKey)){
                $this->authenicateBySecretKey($data->user, $data->su);
            }
        }
        redirect('portal/payment_choice_open');
    }
    
    private function buildInformation()
    {
        $data = $this->input->post();
        $paymentBiz = new PortalPaymentManager();
        $theKey  = $paymentBiz->insertTemp($data['order']);
        $this->session->set_userdata(self::TEMP_SESSION_KEY_ORDER,$theKey);
    }
    
    function showPageRedirect(){
        redirect('portal/payment_choice_open');
    }
}