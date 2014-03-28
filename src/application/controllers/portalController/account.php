<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class account extends BaseController
{

    protected $authorization_required = FALSE;

    /**
     * Register account
     */
    function registerAccount()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordRetry = $this->input->post('passwordRetry');
        $fristName = $this->input->post('fristName');
        $lastName = $this->input->post('lastName');
        $dob = $this->input->post('dob').' 00:00:00';
        $sex = $this->input->post('sex');
        //TODO: Valid data
        
        $accBiz = new PortalAccountBiz();
        $id = $accBiz->insertNewUserNormal($fristName, $lastName, $email, $password, $sex, $dob);
        if($id){
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->render('registercomplete');
        }else{
            throw new Lynx_Exception(__CLASS__.'Đăng ký tài khoản không thành công');
        }
    }
    
    /**
     * show information page
     */
    function showAccountInformation(){
        $currentUser = User::getCurrentUser();
        
    }
}