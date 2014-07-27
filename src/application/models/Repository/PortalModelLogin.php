<?php
/**
 * Thực hiện các biz liên quan đến việc login
 * @author ANLT
 * @since 20140317
 */
class PortalModelLogin extends PortalModelBase
{
    
    
    /**
     * Thực hiên việc đăng nhập vào hệ thống.
     * @param string $us
     * @param string $pw
     * @return bool
     */
    function Login($us,$pw){
        $portalUserModel = new PortalModelUser();
        $portalUserModel->account = $us;
        $portalUserModel->password = $us;
        $portalUserModel->selectUserByUserNameAndPassoword();
    }
}