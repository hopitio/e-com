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
    protected function authenicateBySecretKey($user,$secretKey)
    {
        
    }
}