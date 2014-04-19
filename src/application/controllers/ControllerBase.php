<?php
class BaseController extends MY_Controller{
    /**
     * Lấy thông tin Query string.
     * @return array
     */
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }
    
    /**
     * 
     * @param User $user
     * @param string $secretKey
     */
    protected function authenicateBySecretKey($user,$subSystemName)
    {
        if ($this->obj_user->secretKey != $user->secretKey)
        {
            throw new Lynx_AuthenticationException(
                __CLASS__ . ' ' . __FUNCTION__ . 'secretKey không phù hợp');
        }
        
        $portalHistory = new PortalBizUserHistory();
        $userQuery = $portalHistory->checkLoginHistory($user->secretKey, 
            $subSystemName);
        if (! $userQuery)
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
        
        log_message('error',var_export($this->obj_user,true));
    }
}