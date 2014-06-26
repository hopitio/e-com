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
        $data = $this->input->post();
        $facebookMe = json_decode( $this->input->post('postValue'));
        $loginBiz = new PortalBizAccount();
        $user = $loginBiz->getLogin($facebookMe->email,null,DatabaseFixedValue::USER_PLATFORM_FACEBOOK);
        if(!$user){
            $this->insertFacebookAccountToProtal($facebookMe);
            $user = $loginBiz->getLogin($facebookMe->email,null,DatabaseFixedValue::USER_PLATFORM_FACEBOOK);
        }
        $this->obj_user =  $user;
        $this->obj_user->is_authorized = true;
        $this->obj_user->portal_id = $user->id;
        $this->set_obj_user_to_me($this->obj_user);
        
        $this->onLoginComplete();
    }
    
    private function insertFacebookAccountToProtal($facebookAccount){
        $accountBiz = new PortalBizAccount();
        if(isset($facebookAccount->middle_name)){
            $firstname = $facebookAccount->first_name.' '.$facebookAccount->middle_name;
        }else{
            $firstname = $facebookAccount->first_name;
        }
        $lastname = $facebookAccount->last_name;
        $account = $facebookAccount->email;
        $password = null;
        $genderFB =  $facebookAccount->gender;
        $sex = $genderFB == 'male' ? 'M' : $genderFB == 'female' ? 'F' : 0;
        $DOBFB = isset($facebookAccount->birthday) ? $facebookAccount->birthday : null;
        $DOB = $this->convertFbDate($DOBFB);
        $user = $accountBiz->insertNewUserFormPlatform(new User(),$firstname, $lastname, $account, $password, $sex, $DOB,DatabaseFixedValue::USER_PLATFORM_FACEBOOK);
        return $user;
    }
    
    private function convertFbDate($DOBFB){
        list($mm, $dd, $yyyy) = explode("/", $DOBFB);
        $date = "{$yyyy}-{$mm}-{$dd} 00:00:00";
        return $date;
        
    }


}