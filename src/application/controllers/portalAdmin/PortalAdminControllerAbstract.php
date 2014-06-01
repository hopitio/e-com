<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
abstract class PortalAdminControllerAbstract extends BaseController
{
    protected $authorization_required = true;
    protected $is_admin_page = true;
    function __construct()
    {
        parent::__construct();
    }
    
    protected function init(){
        parent::init();
        if($this->is_admin_page && $this->obj_user->user_type != DatabaseFixedValue::USER_TYPE_ADMIN){
            throw new Lynx_AuthenticationException(__FILE__.' '.__LINE__.' '.'KHÔNG CÓ QUYỀN TRUY CẬP ADMIN.');
        }
    }

}