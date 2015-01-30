<?php

/**
 * Xử lý các liên quan đến việc xử login
 * @author ANLT
 * @since 20140426
 */
class PortalBizPassword extends PortalBizBase
{
    /**
     * Hàm thay đổi password.
     * @param string $oldPass
     * @param string $newPass
     */
    function updatePassword($user,$oldPass,$newPass){
        $portalUser = new PortalModelUser();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        if($portalUser->password != $oldPass)
        {
            return false;
        }
        $portalUser->password = $newPass;
        $portalUser->updateById();
        
        $portalUserHistory = new PortalBizUserHistory();
        
        $newId = $portalUserHistory->createNewHistory($user, 
            DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEPASS, 
            'Thay đổi mật khẩu', null, null);
        
        $portalUser = new PortalModelUser();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        $mailData = array(
            'user' => $portalUser
        );
        MailManager::initalAndSend(MailManager::TYPE_RESETPASSWORD_COMFRIM,  $user->account , $mailData);
        return  $portalUser;
    }
    
    /**
     * Check valid password.
     */
    function isValidChangePassword($user,$oldPass){
        $portalUser = new PortalModelUser();
        $portalUser->id = $user->id;
        $portalUser->getOneById();
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
        $portalUserModel = new PortalModelUser();
        $portalUserModel->id = $userId;
        $result = $portalUserModel->getUserByUserId();
        if(!$result){
            return false;
        }
        
        $portalHistoryMode = new PortalModelUserHistory();
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
        $portalUser = new PortalModelUser();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        $portalUser->password = $newPass;
        $portalUser->updateUser();
        
        $portalUserHistory = new PortalBizUserHistory();
        $historyId = $portalUserHistory->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_RESETPASS,'Reset mật khẩu',null,null);
        
        $mailData = array(
            'user'=> $portalUser,
            'password'=>$newPass
        );
        
        MailManager::initalAndSend(MailManager::TYPE_NEWPASSWORD_NOFICATION,  $portalUserModel->account , $mailData);
        return true;
    }
    
    function verifyAndResetPasswordEmail($email)
    {
        $portalModelUser = new PortalModelUser();
        $portalModelUser->account = $email;
        $portalModelUser->platform_key =  DatabaseFixedValue::USER_PLATFORM_DEFAULT;
        $portalModelUsers = $portalModelUser->getMutilCondition();
        
        if(!isset($portalModelUsers[0])){
            return false;
        }
        
        $portalModelUsers = $portalModelUsers[0];
        $newPass = SecurityManager::inital()->getEncrytion()->getNewpassWordforUser();
        $portalModelUsers->password = $newPass;
        $portalModelUsers->updateUser();
        $user = new User();
        $user->id = $portalModelUsers->id;
        $portalUserHistory = new PortalBizUserHistory();
        $historyId = $portalUserHistory->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_RESETPASS,'Reset mật khẩu',null,null);
        
        $mailData = array(
            'user'=> $portalModelUsers,
            'password'=>$newPass
        );
        
        MailManager::initalAndSend(MailManager::TYPE_NEWPASSWORD_NOFICATION,  $portalModelUsers->account , $mailData);
        return true;
    }
    
    /**
     * input email
     * @param string $email
     * @return boolean
     */
    function resendActiveEmail($email){
        $portalModelUser = new PortalModelUser();
        $portalModelUser->account = $email;
        $portalModelUser->platform_key =  DatabaseFixedValue::USER_PLATFORM_DEFAULT;
        $portalModelUsers = $portalModelUser->getMutilCondition();
        if(!isset($portalModelUsers[0])){
            return false;
        }
        $portalModelUser = $portalModelUsers[0];
        $portalModelUser instanceof PortalModelUser;
        if($portalModelUser->status != DatabaseFixedValue::USER_STATUS_REGISTED){
            return false;
        }
        
        MailManager::initalAndSend(MailManager::TYPE_RESG_COMFIRM, $portalModelUser->account,array('user'=>$portalModelUser) );
        
        return true;
    }
}