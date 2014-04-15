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
        if(isset($data['secretKey']) && isset($data['user'])){
            if(!empty($data['secretKey'])){
                $this->authenicateBySecretKey($data['user'], $data['secretKey']);
            }
        }
        redirect('portal/payment_choice_open');
    }
    
    private function buildInformation()
    {
        $data = $this->input->post();
        log_message('error',var_export($data,true));
        $this->session->set_userdata(self::TEMP_SESSION_KEY_ORDER,json_decode($data['order']));
    }
}