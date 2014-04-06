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
        $newId = $portalUserHistory->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEPASS,'Thay đổi mật khẩu',null,null);
        $resetKey = SecurityManager::inital()->getEncrytion()->encrytResetPassword($user, $newId);
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
    function resetPassword(&$user,$encrytedKey)
    {
        $decode = SecurityManager::inital()->getEncrytion()->decrytResetPassword($encrytedKey);
        $userId = $decode->userid;
        $historyKey = $decode->history;
        $portalUserModel = new PortalUserModel();
        $portalUserModel->id = $userId;
        $result = $portalUserModel->getUserByUserId();
        if(!$result){
            return false;
        }
        
        $portalHistoryMode = new PortalUserHistoryModel();
        $portalHistoryMode->id = $historyKey;
        $portalHistoryMode->fk_user = $userId;
        $result = $portalHistoryMode->getByHistoryId();
        
        if(!$result){
            return false;
        }
        
        if($portalHistoryMode->action_name != DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEPASS) {
            return false;
        }
        $newPass = SecurityManager::inital()->getEncrytion()->getNewpassWordforUser();
        $portalUser = new PortalUserModel();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        $portalUser->password = $newPass;
        $portalUser->updateUser();
        
        $portalUserHistory = new PortalUserHistoryBiz();
        $historyId = $portalUserHistory->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_RESETPASS,'Reset mật khẩu',null,null);
        
        $mailData = array(
            'time'=>date(DatabaseFixedValue::DEFAULT_FORMAT_DATE),
            'password'=>$newPass
        );
        
        MailManager::initalAndSend(MailManager::TYPE_NEWPASSWORD_NOFICATION,  $portalUserModel->account , $mailData);
        return true;
    }
}