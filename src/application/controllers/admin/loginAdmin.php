<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class loginAdmin extends BaseController
{
    protected $authorization_required = FALSE;
    function showpage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)->render('admin/login');
    }
    
    function login()
    {
        $data=$this->input->post();
        if(!isset($data['username']) || !isset($data['password'])){
            throw new Lynx_RequestException('Request với dữ liệu không đúng');
        }
        if($this->is_ajax_request($data['username'])){
            $this->canNotLogin('Tên đăng nhập chưa đúng định dạng [A-Za-z0-9], độ dài hơn 4 ký tự');
            return;
        }
        if($this->is_ajax_request($data['password'])){
            $this->canNotLogin('Mật khẩu chưa đúng định dạng [A-Za-z0-9], độ dài hơn 4 ký tự');
            return;
        }
        $adminAccountBiz = new AdminAccountBiz();
        $admin = $adminAccountBiz->checklogin($data['username'], $data['password']);
        if(!$admin){
            $this->canNotLogin('Tên đăng nhập và mật khẩu chưa đúng');
            return;
        }
        $this->obj_user = new UserAdmin();
        $this->obj_user->is_authorized  = true;
        $this->set_obj_user_to_me($this->obj_user);
        redirect('/__admin/mainpage');
    }
    
    function canNotLogin($msg){
        $data = array();
        $data['error'] = $msg;
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)->setData($data)->render('admin/login');
    }
    
    private function isValidString($value){
        $case = preg_match('@[a-z0-9A-Z]@', $value);
        if(!$case || strlen($password) < 4) {
            return false;
        }
        return true;
    }
}