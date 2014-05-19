<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
abstract class PortalAdminControllerAbstract extends BaseController
{
    protected $authorization_required = false;
    /**
     *
     * @var UserAdmin
     */
    protected $obj_user;

    /**
     * init
     * @return void
     */
    public function init()
    {
        parent::init();
         
        if(!is_a($this->obj_user,'UserAdmin'))
        {
            throw new Lynx_AuthenticationException('Không có quyền truy cập admin');
        }
        // authorization
        if ($this->authorization_required)
        {
            if (!$this->obj_user->is_authorized)
            {
                throw new Lynx_AuthenticationException('Không có quyền truy cập admin');
            }
        }
    }

}