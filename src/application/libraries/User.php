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
    
    protected function load(){
        if($this->is_persistent()){
            $CI =& get_instance();
        }
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
