<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class password extends BaseController
{
    protected $authorization_required = TRUE;
    private $_data = array();
    protected  $_css = array(
        '/style/myaccount.css',
        '/style/span.css'
    );
    
    function showpageChangePassword(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalaccount/changePassword');
    }
    
    /**
     * xử lý việc active
     */
    function updatePasswordPostData(){
       $data = $this->input->post();
       $oldPass = $data['txtOldPass'];
       $newPass = $data['txtNewPass'];
       $comfirmPass = $data['txtConfrimNewPass'];
       $portalPassworBiz = new PortalPassowordBiz();
       if($newPass != $comfirmPass){
            $this->errorMessage('Mật khẩu mới không khớp');
            return;
       }
       if(!$this->isValidResetPasswordData($newPass)){
           $this->errorMessage('Mật khẩu mới không hợp lệ');
           return;
       }
       if(!$portalPassworBiz->isValidChangePassword($this->obj_user, $oldPass)){
            $this->errorMessage('Mật khẩu cũ không khớp');
            return;
       }
       
       $portalPassworBiz->updatePassword($this->obj_user, $oldPass, $newPass);
       
       redirect('/portal/account');
    }
    
    private function errorMessage($msg){
       $data = array();
       $data['errormsg'] = $msg;
       LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->setCss($this->_css)->render('portalaccount/changePassword');
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
   
}