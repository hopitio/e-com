<?php
require_once APPPATH.'controllers/portalController/login.php';
/**
 * Lắng nghe các callback xuất phát từ facebook.
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');
class loginfacebook extends login
{
    protected $authorization_required = FALSE;
    
    /**
     * Thực hiện lấy các config của facebook.
     */
    function loadFacebookConfig_xhr(){
        $data = array(
            'app_key' => $this->config->item('facebook_app_id'),
        );
       $this->output->set_content_type('application/json')->set_output(json_encode($data, true));
    }
    
    //login with facebook.
    function loginFb(){
        $facebookMe = json_decode( $this->input->post('postValue'));
        $logunBiz = new PortalLoginBiz();
        $user = $logunBiz->loginFacebook($facebookMe);
        $this->obj_user->is_authorized = true;
        $this->obj_user->id =  $user->id;
        $this->obj_user->account = $user->account;
        $this->obj_user->firstname = $user->firstname;
        $this->obj_user->lastname = $user->lastname;
        $this->obj_user->sex = $user->sex;
        $this->obj_user->platform_key = $user->platform_key;
        $this->obj_user->status = $user->status;
        $this->obj_user->last_active = $user->last_active;
        $this->obj_user->DOB = $user->DOB;
        
        $this->onLoginComplete();
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($dataResult,false)->render('LoginComplete');
    }


}