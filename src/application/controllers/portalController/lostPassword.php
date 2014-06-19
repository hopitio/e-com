<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class lostPassword extends BasePortalController
{
    protected $authorization_required = FALSE;
    protected  $_css = array(
        '/style/lostPassword.css'
    );
    protected $_data = array(
        
    );
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalaccount/lostPassword');
    }
    
    function reset(){
        $email = $this->input->post();
        $biz = new PortalBizPassword();
        $isComplete = $biz->verifyAndResetPasswordEmail($email['email']);
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/lostPassword', $this->obj_user->languageKey);
        
        IF($isComplete){
            $this->_data['msg'] = "<p>{$language->lblMsgOk}</p>";
        }else{
            $this->_data['msg'] = "<p style='color:red'>{$language->lblMsgNotOk}</p>";
        }
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($this->_data)->setCss($this->_css)->render('portalaccount/lostPassword');
    }
}