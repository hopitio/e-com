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
       
    }
}