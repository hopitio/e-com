<?php
/**
 * Thực việc liên quan đến generation url 
 * @author ANLT
 * @since 20140329
 */
class UrlManager
{
    var $_CI;
    function __construct(){
        $this->_CI = get_instance();
    }
    
    function getLoginFacebookUrl(){
        return $this->_CI->config->item('facebook_authen_url');
    }
    
    /**
     * @return UrlManager.
     */
    static function getInstanse(){
        static $instance =  null;
        if($instance == null){
            $instance = new UrlManager();
        }
        return $instance;
    }
}