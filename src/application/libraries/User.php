<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
 */
class User{

    public $is_authorized = false;
    public $languageKey = 'VN-VI';
    private $authenUrl = '/portal/login';
    private $callBack = '/__portal/authen';
    private $logout = "/logout";
    
    //Database mapping
    public $id = 1;
    public $firstname;
    public $lastname;
    public $account;
    public $sex;
    public $DOB;
    public $date_joined;
    public $status;
    public $last_active;
    public $platform_key;
    
    //END DATABASE
    function __construct(){
        $CI =& get_instance();
        $this->authenUrl = $CI->config->item(platform_login_url);
        $this->callBack = $CI->config->item(platform_login_callback);
        $this->logout = $CI->config->item(platform_logout);
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
    
    /**
     * Lấy đường dẫn sử dụng để login.
     */
    function getLoginAuthenUrl(){
        return $this->authenUrl.'?u='.urlencode($this->callBack).'&t='.urlencode(Common::curPageURL()) ;
    }
    /**
     * get logout
     * @return string
     */
    function getLogout(){
        return $this->logout.'?u='.urlencode(Common::curPageURL());
    }
}
