<?php

/**
 * Xử lý các liên quan đến việc xử login
 * @author ANLT
 * @since 20140426
 */
class PortalPassowordBiz extends PortalBaseBiz
{
    /**
     * Hàm thay đổi password.
     * @param string $oldPass
     * @param string $newPass
     */
    function updatePassword($user,$oldPass,$newPass){
        $portalUser = new PortalUserModel();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        if($portalUser->password != $oldPass)
        {
            return false;
        }
        $portalUser->password = $newPass;
        $portalUser->updateUser();
        
        $portalUserHistory = new PortalUserHistoryBiz();
        $historyId = $portalUserHistory->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEPASS,'Thay đổi mật khẩu',null,null);
        
        $resetKey = SecurityManager::inital()->getEncrytion()->encrytResetPassword($user, $historyId);
        $resetKey =  urlencode($resetKey);
        
        $link =  get_instance()->config->item('path_to_reset_password_reset');
        $link =  str_replace('{key}', $resetKey, $link);
        
        $mailData = array(
            'time'=>date(DatabaseFixedValue::DEFAULT_FORMAT_DATE),
            'link'=>$link
        );
        
        MailManager::initalAndSend(MailManager::TYPE_RESETPASSWORD_COMFRIM,  $user->account , $mailData);
        return  $portalUser;
    }
    
    
    /**
     * Check valid password.
     */
    function isValidChangePassword($user,$oldPass){
        $portalUser = new PortalUserModel();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        if($portalUser->password != $oldPass)
        {
            return false;        
        }
        return true;
    }
    
    /**
     * Thực hiện việc thay đổi password.
     * @param user $user
     */
    function resetPassword($user,$encrytedKey)
    {
        
    }
    
}