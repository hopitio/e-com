<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
 */
class User{

    public $is_authorized;
    public $languageKey = 'VN-VI';
    public $authenUrl = '/portal/login';
    
    function __construct(){
        $CI =& get_instance();
        $this->authenUrl = $CI->config->item('platform_login_url');
    }

    protected function save(){

    }

    public function touch(){
        
    }
    
    /**
     * Get current user in session.
     * @return User
     */
    static function getCurrentUser(){
        $objUser = get_instance()->session->userdata(USER_SESSION);
        if(is_a($objUser, 'User')){
            return $objUser;
        }else{
            return new User();
        }
    }
}
