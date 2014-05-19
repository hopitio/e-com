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
            $this->obj_user = new UserAdmin();
            $this->set_obj_user_to_me($this->obj_user);
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