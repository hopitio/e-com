<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
 */
class User
{

    public $is_authorized = false;
    public $languageKey = 'EN-US';
    public $currencyKey = 'USD';
    private $authenUrl = '/portal/login';
    private $callBack = '/__portal/authen';
    private $logout = "/logout";
    private $currencyMap = array(
        'VN-VI' => 'VND',
        'EN-US' => 'USD',
        'KO-KR' => 'KRW'
    );
    //Database mapping
    public $id;
    public $full_name;
    public $account = 'Anonymous';
    public $sex;
    public $DOB;
    public $date_joined;
    public $status;
    public $last_active;
    public $platform_key;
    public $user_type = DatabaseFixedValue::USER_TYPE_USER;
    public $secretKey;
    public $portal_id;
    public $sub_id;
    public $phone;

    //END DATABASE
    function __construct()
    {
        $CI = & get_instance();
        $this->authenUrl = $CI->config->item(platform_login_url);
        $this->callBack = $CI->config->item(platform_login_callback);
        $this->logout = $CI->config->item(platform_logout);
    }

    protected function save()
    {
        
    }

    public function touch()
    {
        
    }

    /**
     * Lấy đường dẫn sử dụng để login.
     */
    function getLoginAuthenUrl()
    {
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
    function getLogout()
    {
        return $this->logout . '?u=' . urlencode(Common::curPageURL());
    }

    function getFullname()
    {
        return $this->full_name;
    }

    function getCurrency()
    {
        return $this->currencyMap[$this->languageKey];
    }

    static function getCurrentUser()
    {
        $objUser = get_instance()->session->userdata(USER_SESSION);
        if (!is_a($objUser, 'User'))
        {
            $objUser = new User();
        }
        $objUser->fullname = $objUser->getFullname();
        $objUser->full_name = $objUser->getFullname();
        return $objUser;
    }

    /** biến window.$user */
    static function getCurrentUserForJson()
    {
        $objUser = get_instance()->session->userdata(USER_SESSION);
        if (!is_a($objUser, 'User'))
        {
            $objUser = new User();
        }
        $user = clone $objUser;
        $user->fullname = $user->getFullname();
        $allowedKeys = array(
            'DOB',
            'account',
            'currencyKey',
            'date_joined',
            'fullname',
            'is_authorized',
            'languageKey',
            'phone',
            'sex'
        );
        foreach (get_object_vars($user) as $k => $v)
        {
            if (!in_array($k, $allowedKeys))
            {
                unset($user->{$k});
            }
        }
        return $user;
    }

}
