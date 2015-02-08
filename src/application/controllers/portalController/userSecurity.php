<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến cử lý security.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userSecurity extends BasePortalController
{
    protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css'
    );
    protected $_js = array('/js/controller/PortalUserSecurityAccountController.js'
                            ,'/js/services/PortalUserSecurityServiceClient.js');
    protected $_data = array();
    
    /**
     * show information page
     */
    function showPage(){
        $password = $this->input->get("token");
        $this->_data = array(
        	'token' => $password
                );
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($this->_data)
        ->setJavascript($this->_js)
        ->setCss($this->_css)
        ->render('portalaccount/userSecurity');
    }
    
    /**
     * xử lý việc active
     */
    function updatePasswordPostDataXhr(){
       $data = $this->input->post();
       $oldPass = $data['oldPassword'];
       $newPass = $data['newPassword'];
       $comfirmPass = $data['confrimPassword'];
       $portalPassworBiz = new PortalBizPassword();
       
       $languge = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userSecurity', $this->obj_user->languageKey);
       
       if($newPass != $comfirmPass){
           $this->updatePasswordError($languge->errorMsgWorngNewPassword);
            return;
       }
       
       $isValidNewPassword = $this->isValidResetPasswordData($newPass);
       if(!$isValidNewPassword){
          $this->updatePasswordError($languge->errorMsgWorngComparePassword);
          return;
       }
       
       if(!$portalPassworBiz->isValidChangePassword($this->obj_user, $oldPass)){
           $this->updatePasswordError($languge->errorMsgWorngOldPassword);
            return;
       }
       
       $portalPassworBiz->updatePassword($this->obj_user, $oldPass, $newPass);
       
       $result = new AsyncResult();
       $result->isError = false;
       $result->data = array('completeMsg'=>$languge->msgUpdatePasswordComplete->__tostring());
       $this->output->set_content_type('application/json')->set_output(json_encode($result, true));
    }
    
   private function updatePasswordError($msg){
        $result = new AsyncResult();
        $result->isError = true;
        $result->errorMessage = $msg->__tostring();
        $result->data = null;
        $this->output->set_content_type('application/json')->set_output(json_encode($result, true));
    }
    
    /**
     * Hỗ trợ việc valid dữ liệu
     * @param string $username
     * @param string $password
     * @return bool
     */
    private function isValidResetPasswordData($password){
        $case = preg_match('@[a-z0-9A-Z]@', $password);
        if(!$case || strlen($password) < 8) {
            return false;
        }
        return true;
    }
    
    
    function updateAlertEmailXhr(){
        $data = $this->input->post();
        $newEmail = $data['email'];
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userSecurity', $this->obj_user->languageKey);
        $result = new AsyncResult();
        $result->isError = true;
        $result->errorMessage = $language->emailInvalidMsg->__tostring();
        $this->output->set_content_type('application/json')->set_output(json_encode($result, true));
    }
    
    function getUserLastLoginTimeXhr($time)
    {
        $portalBizUserHistory = new PortalBizUserHistory();
        $result = new AsyncResult();
        $result->isError = false;
        $result->data = $portalBizUserHistory->getLastLoginTime(User::getCurrentUser()->id,$time);
        $this->output->set_content_type('application/json')->set_output(json_encode($result, true));
    }
}