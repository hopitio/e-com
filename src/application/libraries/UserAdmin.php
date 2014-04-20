<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
*/
class UserAdmin extends User
{
    /**
     * Lấy đường dẫn sử dụng để login.
     */
    function getLoginAuthenUrl(){
        return '/__admin/login';
    }
    
    /**
     * 
     * @return AdminUser
     */
    static function getCurrentUser(){
        $objUser = get_instance()->session->userdata(USER_SESSION);
        if(is_a($objUser, 'UserAdmin')){
            return $objUser;
        }else{
            return new User();
        }
    }
}