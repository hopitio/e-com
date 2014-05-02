<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến cử lý Order history.
 * @author ANLT 
 * @since 20140428
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userLanguage extends BaseController
{
    protected $authorization_required = FALSE;
    protected  $_css = array(
        '/style/myaccount.css'
    );
    protected $_js = array();
    protected $_data = [];
    
    function submitChangeXhr(){
        $newLanguage = $this->input->post('languageKey');
        if($newLanguage == null || !isset($newLanguage))
        {
            $newLanguage = 'VN-VI';
        }
        $supportedLanguages = $this->config->item('languages_supported');
        if(!in_array($newLanguage, $supportedLanguages)){
            throw new Lynx_BusinessLogicException(__FILE__.' '.__LINE__.' '.'Ngôn ngữ không tồn tại '.'"'.$newLanguage.'"');
        }
        if(User::getCurrentUser()->id == null || !isset(User::getCurrentUser()->id))
        {
            
        }else{
            $portalbizLanguage = new  PortalBizLanguage();
            $portalbizLanguage->changeLanguage($this->obj_user, $newLanguage);
            $this->obj_user->languageKey = $newLanguage;
        }
        
        $this->obj_user->languageKey = $newLanguage;
        $this->set_obj_user_to_me($this->obj_user);
        $asyncResult = new AsyncResult();
        $asyncResult->isError = false;
        $asyncResult->data = true;
        log_message('error',var_export($this->obj_user,true));
        $this->output->set_content_type('application/json')->set_output(json_encode($asyncResult, true));
    }
}