<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
 */
 class User extends AbstractUser{

    public $is_authorized = false;
    public $languageKey = 'VN-VI';
    public $currencyKey = 'VND';
    private $authenUrl = '/portal/login';
    private $callBack = '/__portal/authen';
    private $logout = "/logout";
    
    //Database mapping
    public $id;
    public $firstname;
    public $lastname;
    public $account;
    public $sex;
    public $DOB;
    public $date_joined;
    public $status;
    public $last_active;
    public $platform_key;
    
    public $secretKey;
    
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
     * Lấy đường dẫn sử dụng để login.
     */
    function getLoginAuthenUrl(){
        
        $url = $this->authenUrl;
        $url = str_replace('{cp}', urlencode(Common::curPageURL()), $url);
        $url = str_replace('{ep}', urlencode($this->callBack), $url);
        $url = str_replace('{su}', urlencode(get_instance()->config->item('subSystemName')), $url);
        $url = str_replace('{se}', urlencode(get_instance()->session->userdata('session_id')), $url);
        return $url;
    }
    
    /**
     * get logout
     * @return string
     */
    function getLogout(){
        return $this->logout.'?u='.urlencode(Common::curPageURL());
    }
    
    function getFullname(){
        return $this->firstname . ' ' . $this->lastname;
    }
}
