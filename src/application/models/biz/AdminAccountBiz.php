<?php
class AdminAccountBiz extends BaseBiz
{
    /**
     * Kiểm tra admin login vào hệ thống
     * @param unknown $username
     * @param unknown $password
     * @return boolean
     */
    function checklogin($username,$password)
    {
        $adminAccountModel = new AdminAccountModel();
        $adminCollection = $adminAccountModel->loadAdminAccount();
        for($i = 0 ; $i < $adminCollection->count() ; $i++){
           if($username == $adminCollection->admin[$i]->username && $password == $adminCollection->admin[$i]->password){
              return $adminCollection->admin[$i];
           }
        }
        return false;
    }
}