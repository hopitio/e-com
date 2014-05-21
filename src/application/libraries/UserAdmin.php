<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
*/
class UserAdmin extends AbstractUser
{
    function getLoginAuthenUrl(){
        if(strpos($_SERVER['REQUEST_URI'],'/portal/')){
            return '/portal/__admin/login';
        }else{
            return '/__admin/login';
        }
    }

}