<?php

/**
 * Xử lý các biz liên quan đến việc tương tác với tài khoản.
 * @author ANLT
 * @since 20140425
 */
class PortalAccountBiz extends PortalBaseBiz
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * insert new user.
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $account
     * @param string $password
     * @param string $sex
     * @param string $DOB
     *            //format YYYY-MM-DD HH:MM:SS
     */
    function insertNewUserNormal($firstname, $lastname, $account, $password, $sex, 
        $DOB, $question = '', $answer = '')
    {
        $newId = $this->insertNewUser($firstname, $lastname, $account, $password, $sex, $DOB, DatabaseFixedValue::USER_PLATFORM_DEFAULT,$question, $answer);
        //$this->activeUser($newId);
        $portalUserModel = new PortalUserModel();
        $portalUserModel->id = $newId;
        $portalUserModel->getUserByUserId();
        
        $linkActive = $this->config->item('path_to_active_account');
        $activeKey  = SecurityManager::inital()->getEncrytion()
                      ->accountActiveEncrytion($portalUserModel->id, $portalUserModel->account, $portalUserModel->date_joined); 
        
        $linkActive = str_replace('{key}', $activeKey, $linkActive);
        $mailData = array(
             'link' => $linkActive,
        );
        
        
        
        MailManager::initalAndSend(MailManager::TYPE_RESG_COMFIRM, $account, $mailData);
        
        $history = new PortalUserHistoryBiz();
        $user = new User();
        $user->id = $newId;
        $history->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_REGISTE,'REGISTER FROM PORTAL FORM',null,null);
        
        return $newId;
    }
    
    /**
     * thêm user từ platform facebook....
     * @param string $firstname
     * @param string $lastname
     * @param string $account
     * @param string $password
     * @param string $sex
     * @param string $DOB
     *            //format YYYY-MM-DD HH:MM:SS
     */
    function insertNewUserFormPlatform($firstname, $lastname, $account, $password, $sex, 
        $DOB, $platformKey = DatabaseFixedValue::USER_PLATFORM_DEFAULT )
    {
        $newId = $this->insertNewUser($firstname, $lastname, $account, $password, $sex, $DOB, $platformKey);
        $history = new PortalUserHistoryBiz();
        $history->createNewHistory(null,DatabaseFixedValue::USER_HISTORY_ACTION_REGISTE,'REGISTER FORM '.$platformKey,null,null);
        return  $this->activeUser($newId);
    }

    /**
     * insert new user.
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $account            
     * @param string $password            
     * @param string $sex            
     * @param string $DOB
     *            //format YYYY-MM-DD HH:MM:SS
     * @param string $phoneno            
     */
    private function insertNewUser($firstname, $lastname, $account, $password, 
        $sex, $DOB, $platformKey, $question = '', $answer = '')
    {
        $userModel = new PortalUserModel();
        $userModel->firstname = $firstname;
        $userModel->lastname = $lastname;
        $userModel->account = $account;
        $userModel->password = $password;
        $userModel->sex = $sex;
        $userModel->DOB = $this->verifyDate($DOB);
        $userModel->date_joined = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $userModel->status = DatabaseFixedValue::USER_STATUS_REGISTED;
        $userModel->status_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $userModel->status_reason = 'Tạo mới tài khoản';
        $userModel->last_active = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $userModel->platform_key = $platformKey;
        $newId = $userModel->insert();
        
        $this->insertSettingKey($newId, $userModel->account, $question, $answer);
        
        return $newId;
    }

    private function insertSettingKey($newId,$alterEmail,$question = '', $answer = ''){
        //Insert user setting.
        $portalUserSetting = new PortalUserSettingModel();
        
        //Tự động gửi mail key
        $isreceiveEmailSetting = new PortalUserSettingModel();
        $isreceiveEmailSetting->fk_user = $newId;
        $isreceiveEmailSetting->setting_key = DatabaseFixedValue::USER_SETTING_KEY_RecivedEmail;
        $isreceiveEmailSetting->value = DatabaseFixedValue::USER_SETTING_KEY_RecivedEmail_HAVERECIVE;
        
        //Alter mail
        $isAlterEmailSetting = new PortalUserSettingModel();
        $isAlterEmailSetting->fk_user = $newId;
        $isAlterEmailSetting->setting_key = DatabaseFixedValue::USER_SETTING_KEY_AlternativeEmail;
        $isAlterEmailSetting->value = $alterEmail;
        
        //Security Question.
        $questionSetting = new PortalUserSettingModel();
        $questionSetting->fk_user = $newId;
        $questionSetting->setting_key = DatabaseFixedValue::SECURITY_QUESTION_SETTINGKEY;
        $questionSetting->value = $question;
        
        //Security Answer.
        $questionAns = new PortalUserSettingModel();
        $questionAns->fk_user = $newId;
        $questionAns->setting_key = DatabaseFixedValue::SECURITY_ANSWER_SETTINGKEY;
        $questionAns->value = $answer;
        
        $settingArray = array();
        array_push($settingArray, $isreceiveEmailSetting, $isAlterEmailSetting,$questionSetting,$questionAns);
        $result = $portalUserSetting->insertBatch($settingArray);
        
        return $result;
    }
    
    /**
     * Kiểm tra dữ liệu login
     * @param string $username
     * @param string $password
     * @param string $formPlatform
     * @return 
     */
    function getLogin($username,$password,$formPlatform = null,$toSubsys = null,$subSystemSessionId = null){
        $userModel = new PortalUserModel();
        $userModel->account = $username;
        $userModel->password = $password;
        $formPlatform = $formPlatform == null ? DatabaseFixedValue::USER_PLATFORM_DEFAULT : $formPlatform;
        $result = $formPlatform == DatabaseFixedValue::USER_PLATFORM_DEFAULT ? $userModel->selectUserByUserNameAndPassoword() : $userModel->selectUserByUserName();

        if ($result)
        {
            $this->setLoginUser($result);
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * Set login user
     */
    private function setLoginUser()
    {
        
    }
    
    /**
     * verify date
     *
     * @return string datetime.
     */
    private function verifyDate($strDate)
    {
        return $strDate;
    }

    /**
     * Lấy dữ liệu về user hiện tại
     * 
     * @return array Query Result.
     */
    function getCurrentUserInformation()
    {
        $user = User::getCurrentUser();
        $query = $this->getUserInformation($user->id);
        return $query;
    }

    /**
     * Get user by userID
     * 
     * @param string $userId            
     * @return array Query Result.
     */
    private function getUserInformation($userId)
    {
        $userModel = new PortalUserModel();
        $userModel->id = $userId;
        $queryResultFlag = $userModel->getUserByUserId();
        if ($queryResultFlag)
        {
            return $userModel;
        }
        else
        {
            throw new Lynx_DatabaseQueryException(
                __CLASS__ . '::getUserInformation không lấy được dữ liệu user');
        }
    }

    /**
     * update lần đăng nhập cuối cùng của tài khoản.
     * @param unknown $userId
     * @return boolean
     */
    function updateLastActive($userId)
    {
        $userModel = new PortalUserModel();
        $userModel->id = $userId;
        $userModel->getUserByUserId();
        
        $userModel->last_active = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $userModel->updateUser();
        
        return $userModel->getUserByUserId();
    }

    /**
     *
     * @return mixed
     */
    private function updateUserStatus($userId, $status, $reason)
    {
        $userModel = new PortalUserModel();
        $userModel->id = $userId;
        $userModel->getUserByUserId();
        
        $userModel->status = $status;
        $userModel->status_date = date(DatabaseFixedValue::USER_STATUS_OPENED);
        $userModel->status_reason = $reason;
        $userModel->updateUser();
        
        return $userModel->getUserByUserId();
    }

    /**
     * Thực hiện việc detele user.
     * 
     * @param string $userId            
     * @param string $reason            
     * @return mixed
     */
    function deleteUser($userId, $reason = 'Xóa User')
    {
        return $this->updateUserStatus($userId, 
            DatabaseFixedValue::USER_STATUS_CLOSED, $reason);
    }

    /**
     * Chuyển user từ đăng ký thành user open.
     * 
     * @return mixed return array if active complete, unless return false;
     */
    function activeUser($userId)
    {
        $userModel = new PortalUserModel();
        $userModel->id = $userId;
        $userModel->getUserByUserId();
        if ($userModel->status != DatabaseFixedValue::USER_STATUS_REGISTED)
        {
            return false;
        }
        
        $reason = 'Thực hiện việc active user';
        $this->updateUserStatus($userId, DatabaseFixedValue::USER_STATUS_OPENED, $reason);
        
        return $userModel->getUserByUserId();
    }
    
    
    /**
     * 
     * @param string $requestString
     * @return string er_actived|er_active_error|actived;
     */
    function activeUserByRequest($requestString){
        $activeErrorActived = 'er_actived';
        $activeError = 'er_active_error';
        $actived = 'actived';
        $data = SecurityManager::inital()->getEncrytion()->accountActiveDencrytion($requestString);
        $userID = $data->userid;
        $portalModel = new PortalUserModel();
        $portalModel->id = $userID;
        $portalModel->getUserByUserId();
        
        if($portalModel->status != DatabaseFixedValue::USER_STATUS_REGISTED){
            log_message('error',__CLASS__.'::'.__METHOD__.' Tài khoản đã được active - '.var_export($requestString,true));
            return $activeErrorActived;
        } 
        
        $user = $this->activeUser($userID);
        return $actived;
    }
    
    /**
     * Chỉnh sửa danh sách setting 
     */
    private function updateSettingAccount($userId,$settingKey,$settingValue)
    {
        $portalUserSetting = new PortalUserSettingModel();
        $portalUserSetting->id = $userId;
        $portalUserSetting->setting_key =  $settingKey;
        $portalUserSetting->value = $settingValue;
    }
    
    function updatePassword(){
    
    }

}