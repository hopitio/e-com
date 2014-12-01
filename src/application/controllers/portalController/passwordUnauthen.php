<?php
require_once APPPATH.'controllers/portalController/password.php';
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến account trong trường hợp không cần login
 * @author ANLT 
 * @since 20140403
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class passwordUnauthen extends BasePortalController
{
    
    protected $authorization_required = FALSE;
    protected $_data = array();
    protected  $_css = array(
        '/style/lostPassword.css'
    );
    function resetPassword()
    {
        $data = $this->getQueryStringParams();
        if(!isset($data['k'])){
            throw new Lynx_RequestException('Request hệ thông khác so với yêu cầu vui lòng liên hệ admin.');
        }
        $passwordBiz = new PortalBizPassword();
        $result = $passwordBiz->resetPassword($this->obj_user, $data['k']);
        $viewdata = array();
        $woringData = array();
        $language = MultilLanguageManager::getInstance()
        ->getLangViaScreen('portalaccount_resetPassword', User::getCurrentUser()->languageKey);
        if(!$result){
            $viewdata['error'] = $language->lblError;
        }else {
            $viewdata['msg'] = $language->lblDone;
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($viewdata)->render('portalaccount/resetPassword');
    }
    
    function resend(){
        
        $viewdata = array();
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setCss($this->_css)
        ->setData($viewdata)->render('portalaccount/resend');
    }
    
    function resend_check_and_send(){
        $email = $this->input->post ("email");
        $biz = new PortalBizPassword ();
        $isComplete = $biz->resendActiveEmail($email);
        $language = MultilLanguageManager::getInstance ()->getLangViaScreen ( 'portalaccount/resend', $this->obj_user->languageKey );
        IF ($isComplete) {
            $this->_data ['msg'] = "<p>{$language->lblMsgOk}</p>";
        } else {
            $this->_data ['msg'] = "<p style='color:red'>{$language->lblMsgNotOk}</p>";
        }
        LayoutFactory::getLayout ( LayoutFactory::TEMP_PORTAL_ONE_COL )
        ->setData ( $this->_data )
        ->setCss ( $this->_css )
        ->render ( 'portalaccount/resend' );
    }
}