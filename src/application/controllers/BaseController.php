<?php

class BaseController extends MY_Controller
{

    protected $is_portal_controller = false;
    protected $is_admin_page = false;

    /**
     * Lấy thông tin Query string.
     * @return array
     */
    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }

    function __construct()
    {
        parent::__construct();
    }

    protected function init()
    {
        parent::init();
        //TODO: Hardcode cho giai đoạn đầu cần remove khi thực sự có 2 hệ thống. 
        // Lưu lý cần xóa cả cờ is_portal_controller
        if ($this->is_portal_controller)
        {
            $this->obj_user->id = $this->obj_user->portal_id;
            $this->set_obj_user_to_me($this->obj_user);
        }
        else
        {
            if (($this->obj_user->sub_id == null || !isset($this->obj_user->sub_id)) &&
                    ($this->obj_user->portal_id != null || isset($this->obj_user->portal_id)))
            {
                $bizUser = new BizUser();
                $this->obj_user = $bizUser->processLoginFromPortal($this->obj_user);
            }
            $this->obj_user->id = $this->obj_user->sub_id;
            $this->set_obj_user_to_me($this->obj_user);
        }
        $this->autoDetectLanguage();
    }

    protected function autoDetectLanguage()
    {
        $arr_lang = array(
            'vi' => 'VN-VI',
            'en' => 'EN-US',
            'kr' => 'KO-KR'
        );
        $uri = trim($_SERVER['REQUEST_URI'], "\/\\");
        foreach ($arr_lang as $short_name => $long_name)
        {
            if (strpos($uri, $short_name) === 0)
            {
                $newLanguage = $long_name;
                break;
            }
        }
        if (!isset($newLanguage))
        {
            return;
        }

        $this->obj_user->languageKey = $newLanguage;
        $this->set_obj_user_to_me($this->obj_user);
    }

    /**
     * 
     * @param User $user
     * @param string $secretKey
     */
    protected function authenicateBySecretKey($user, $subSystemName)
    {
        if ($this->obj_user->secretKey != $user->secretKey)
        {
            throw new Lynx_AuthenticationException(
            __CLASS__ . ' ' . __FUNCTION__ . 'secretKey không phù hợp');
        }

        $portalHistory = new PortalBizUserHistory();
        $userQuery = $portalHistory->checkLoginHistory($user->secretKey, $subSystemName);
        if (!$userQuery)
        {
            throw new Lynx_AuthenticationException(
            __CLASS__ . ' ' . __FUNCTION__ . ' Đăng nhập không thành công');
            return;
        }

        $this->obj_user->is_authorized = true;
        $this->obj_user->id = $userQuery->id;
        $this->obj_user->account = $userQuery->account;
        $this->obj_user->firstname = $userQuery->firstname;
        $this->obj_user->lastname = $userQuery->lastname;
        $this->obj_user->sex = $userQuery->sex;
        $this->obj_user->platform_key = $userQuery->platform_key;
        $this->obj_user->status = $userQuery->status;
        $this->obj_user->last_active = $userQuery->last_active;
        $this->obj_user->DOB = $userQuery->DOB;
        $this->obj_user->secretKey = $user->secretKey;
        $this->set_obj_user_to_me($this->obj_user);

        log_message('error', var_export($this->obj_user, true));
    }

}
