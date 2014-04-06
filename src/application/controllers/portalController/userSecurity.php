<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến cử lý security.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userSecurity extends BaseController
{
    protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css',
        '/style/span.css'
    );
    function showpage()
    {
        $viewdata = array();
        $viewdata['fristName'] = $this->obj_user->firstname;
        $viewdata['lastName'] = $this->obj_user->lastname;
        $viewdata['sex'] = $this->obj_user->sex;
        $viewdata['dob'] = $this->obj_user->DOB;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->setData($viewdata)->render('portalaccount/changeUserInformation');
    }
    
    function saveChange(){
        $data = $this->input->post();
        $fristName = $data['txtFristname'];
        $lastName = $data['txtLastName'];
        $dob =  $data['txtDOB'];
        $sex = $data['sex'];
        if(!isset($fristName) || !isset($lastName) || !isset($dob) || !isset($sex)){
            throw new Lynx_RequestException(__CLASS__.' '.__METHOD__.' Request change user information error');
        }
        
        $error = $this->validForm($fristName, $lastName, $dob, $sex);
        if($error!= null){
            $viewError = array();
            $viewError['errormsg'] = $error;
            $viewError['fristName'] = $fristName;
            $viewError['lastName'] = $lastName;
            $viewError['sex'] = $sex;
            $viewError['dob'] = $dob;
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->setData($viewError)->render('portalaccount/changeUserInformation');
            return;
        }
        
        $accountBiz = new PortalAccountBiz();
        $user = $accountBiz->updateUserInformation($this->obj_user, $fristName, $lastName, $dob, $sex);
        $this->obj_user->id = $user->id;
        $this->obj_user->account = $user->account;
        $this->obj_user->date_joined = $user->date_joined;
        $this->obj_user->DOB = $user->DOB;
        $this->obj_user->firstname = $user->firstname;
        $this->obj_user->lastname = $user->lastname;
        $this->obj_user->last_active = $user->last_active;
        $this->obj_user->lastname = $user->lastname;
        $this->obj_user->platform_key = $user->platform_key;
        $this->obj_user->sex = $user->sex;
        $this->obj_user->status = $user->status;
        $this->set_obj_user_to_me($this->obj_user);
        
        redirect('/portal/account');
    }
    
    function validForm($fristName,$lastName,$dob,$sex){
        if(strlen($fristName) <=0 || strlen($fristName) >= 25){
            return 'Họ và tên đệm chưa được đúng';
        }
        
        if(strlen($lastName) <=0 || strlen($lastName) >= 25){
            return 'Tên chưa được đúng';
        }
        
        if(strlen($dob) <= 0){
            return 'Ngày sinh buộc phải nhập';
        }
        
        return null;
    }
}