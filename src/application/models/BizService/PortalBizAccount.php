<?php

/**
 * Xử lý các biz liên quan đến việc tương tác với tài khoản.
 * @author ANLT
 * @since 20140425
 */
class PortalBizAccount extends PortalBizBase
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
    function insertNewUserNormal($user,$full_name, $phone, $account, $password, $sex, 
        $DOB, $question = '', $answer = '')
    {
        $newId = $this->insertNewUser($user,$full_name, $phone, $account, $password, $sex, $DOB, DatabaseFixedValue::USER_PLATFORM_DEFAULT,$question, $answer);
        $this->activeUser($newId);
        
        $portalUserModel = new PortalModelUser();
        $portalUserModel->id = $newId;
        $portalUserModel->getUserByUserId();
        
//         $linkActive = $this->config->item('path_to_active_account');
//         $activeKey  = SecurityManager::inital()->getEncrytion()
//         ->accountActiveEncrytion($portalUserModel->id, $portalUserModel->account, $portalUserModel->date_joined); 
//         $linkActive = str_replace('{key}', $activeKey, $linkActive);

        //Language key.
        $languagekey = new PortalModelUserSetting();
        $languagekey->fk_user = $newId;
        $languagekey->setting_key = DatabaseFixedValue::LANGUAGE_SETTINGKEY;
        $results = $languagekey->getMutilCondition();
        $languageSetting = $results[0];
        $languageSetting instanceof PortalModelUserSetting;
        $mailData = array('user' => $portalUserModel);
        
        MailManager::initalAndSend(MailManager::TYPE_RESG_COMFIRM, $account, $mailData,$languageSetting->value);
        
        $history = new PortalBizUserHistory();
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
    function insertNewUserFormPlatform($user,$full_name, $phone, $account, $password, $sex, 
        $DOB, $platformKey = DatabaseFixedValue::USER_PLATFORM_DEFAULT )
    {
        $newId = $this->insertNewUser($user,$firstname, $lastname, $account, $password, $sex, $DOB, $platformKey);
        $history = new PortalBizUserHistory();
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
    private function insertNewUser($user,$full_name, $phone, $account, $password, 
        $sex, $DOB, $platformKey, $question = '', $answer = '')
    {
        $userModel = new PortalModelUser(); 
        $userModel->account = $account;
        $results = $userModel->getMutilCondition();
        $isInTemp = count($results) > 0 ? ($results[0]->status == null ? true : false) : false;
        if(count($results) > 0 && !$isInTemp){
            throw new Lynx_ModelMiscException('khởi tạo tài khoản không đúng');
        }
        if(count($results) > 0){
            $oldUserId = $results[0]->id;
        }
        $userModel = new PortalModelUser();
        $userModel->phone = $phone;
        $userModel->full_name = $full_name;
        $userModel->phone = $phone;
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
        
        if($isInTemp){
           $userModel->id = $oldUserId;
           $userModel->updateById();
           $newId = $oldUserId;
        }else{
            $newId =  $userModel->insert();
        }
        $this->insertSettingKey($user,$newId, $userModel->account, $question, $answer);
        
        return $newId;
    }

    private function insertSettingKey($user,$newId,$alterEmail,$question = '', $answer = ''){
        //Insert user setting.
        $portalUserSetting = new PortalModelUserSetting();
        
        //Tự động gửi mail key
        $isreceiveEmailSetting = new PortalModelUserSetting();
        $isreceiveEmailSetting->fk_user = $newId;
        $isreceiveEmailSetting->setting_key = DatabaseFixedValue::USER_SETTING_KEY_RecivedEmail;
        $isreceiveEmailSetting->value = DatabaseFixedValue::USER_SETTING_KEY_RecivedEmail_HAVERECIVE;
        
        //Alter mail
        $isAlterEmailSetting = new PortalModelUserSetting();
        $isAlterEmailSetting->fk_user = $newId;
        $isAlterEmailSetting->setting_key = DatabaseFixedValue::USER_SETTING_KEY_AlternativeEmail;
        $isAlterEmailSetting->value = $alterEmail;
        
        //Security Question.
        $questionSetting = new PortalModelUserSetting();
        $questionSetting->fk_user = $newId;
        $questionSetting->setting_key = DatabaseFixedValue::SECURITY_QUESTION_SETTINGKEY;
        $questionSetting->value = $question;
        
        //Security Answer.
        $questionAns = new PortalModelUserSetting();
        $questionAns->fk_user = $newId;
        $questionAns->setting_key = DatabaseFixedValue::SECURITY_ANSWER_SETTINGKEY;
        $questionAns->value = $answer;
        
        //Language key.
        $languagekey = new PortalModelUserSetting();
        $languagekey->fk_user = $newId;
        $languagekey->setting_key = DatabaseFixedValue::LANGUAGE_SETTINGKEY;
        $languagekey->value = $user->languageKey;
        
        //Currency key.
        $currencyKey = new PortalModelUserSetting();
        $currencyKey->fk_user = $newId;
        $currencyKey->setting_key = DatabaseFixedValue::CURRENCY_SETTINGKEY;
        $currencyKey->value = $user->currencyKey;
        
        $settingArray = array();
        array_push($settingArray, $isreceiveEmailSetting, $isAlterEmailSetting,$questionSetting,$questionAns,$languagekey,$currencyKey);
        $result = $portalUserSetting->insertBatch($settingArray);
        
        return $result;
    }
    
    /**
     * 
     * @param User $user
     * @param unknown $userModel
     * @return User
     */
    private function mappingModelWithUser($user,$userModel){
        $user->id = $userModel->id;
        $user->account = $userModel->account;
        $user->date_joined = $userModel->date_joined;
        $user->DOB = $userModel->DOB;
        $user->full_name = $userModel->full_name;
        $user->last_active = $userModel->last_active;
        $user->phone = $userModel->phone;
        $user->platform_key = $userModel->platform_key;
        $user->sex = $userModel->sex;
        $user->status = $userModel->status;
        $user->user_type = $userModel->user_type;
        $user->portal_id = $userModel->id;
        return $user;
    }
    
    /**
     * Kiểm tra dữ liệu login
     * @param string $username
     * @param string $password
     * @param string $formPlatform
     * @return 
     */
    function getLogin($username,$password, $formPlatform = null,$toSubsys = null,$subSystemSessionId = null){
        $userModel = new PortalModelUser();
        $userModel->account = $username;
        $userModel->password = $password;
        $userModel->platform_key = $formPlatform == null ? DatabaseFixedValue::USER_PLATFORM_DEFAULT : $formPlatform;
        $result = $userModel->getMutilCondition();
        if(count($result) <= 0){
            return false;
        }
        
        if($formPlatform != null && $formPlatform != $result[0]->platform_key){
            return false;
        }
        
        if($result[0]->status != DatabaseFixedValue::USER_STATUS_OPENED)
        {
            return false;
        }
        
        else
        {
            $user = new User();
            $portalModelUserSetting = new PortalModelUserSetting();
            $portalModelUserSetting->fk_user = $result[0]->id;
            $settings = $portalModelUserSetting->getMutilCondition();
            foreach ($settings as $setting)
            {
                if($setting->setting_key == DatabaseFixedValue::CURRENCY_SETTINGKEY){
                    $user->currencyKey = $setting->value;
                }
                if($setting->setting_key == DatabaseFixedValue::LANGUAGE_SETTINGKEY){
                    $user->languageKey = $setting->value;
                }
            }
            $user = $this->mappingModelWithUser($user,$result[0]);
            return $user;
        }
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
    public function getUserInformation($userId)
    {
        $userModel = new PortalModelUser();
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
        $userModel = new PortalModelUser();
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
        $userModel = new PortalModelUser();
        $userModel->id = $userId;
        $userModel->getUserByUserId();
        
        $userModel->status = $status;
        $userModel->status_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $userModel->status_reason = $reason;
        $userModel->updateById();
        
        return $userModel->getUserByUserId();
    }

    /**
     * Chuyển user từ đăng ký thành user open.
     * 
     * @return mixed return array if active complete, unless return false;
     */
    function activeUser($userId)
    {
        $userModel = new PortalModelUser();
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
        $portalModel = new PortalModelUser();
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
        $portalUserSetting = new PortalModelUserSetting();
        $portalUserSetting->id = $userId;
        $portalUserSetting->setting_key =  $settingKey;
        $portalUserSetting->value = $settingValue;
    }
    
    /**
     * update user information
     * @param object $user current user.
     * @param string $fristName
     * @param string $lastName
     * @param string $dob
     * @param string $sex
     */
    function updateUserInformation($user,$full_name, $phone,$dob,$sex){
        $portalUserModel = new PortalModelUser();
        $portalUserModel->id = $user->id;
        $portalUserModel->phone = $phone;
        $portalUserModel->full_name = $full_name;
        $portalUserModel->DOB = $dob;
        $portalUserModel->sex = $sex;
        $portalUserModel->updateById();
        
        $portalUserHistoryBiz = new PortalBizUserHistory();
        $portalUserHistoryBiz->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEINFORMATION ,'Thay đổi thông tin cá nhân',null,null);
        
        $user = new User();
        $user = $this->mappingModelWithUser($user,$portalUserModel);
        
        return $user;
    }
    
    function findUser($userId,$account,$fullname, $limit, $offset){
        $portalModel  = new PortalModelUser();
        return $portalModel->findUsers($userId, $account, $fullname, $limit, $offset);
    }
    function findUserCount($userId,$account,$fullname){
        $portalModel  = new PortalModelUser();
        return $portalModel->findUsersCount($userId, $account, $fullname);
    }
    
    private function updateLoginStatus($userid,$status,$msg){
        $portalAccount = new PortalModelUser();
        $portalAccount->id = $userid;
        $portalAccount->getOneById();
        $portalAccount->status_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $portalAccount->status_reason = $msg;
        $portalAccount->status = $status;
        return $portalAccount->updateById();
    }
    
    function updateToRejectLoginStatus($userid){
        return $this->updateLoginStatus($userid,DatabaseFixedValue::USER_STATUS_CLOSED,'Admin khóa tài khoản');
    }
    
    function updateToOpenLoginStatus($userid){
        return $this->updateLoginStatus($userid,DatabaseFixedValue::USER_STATUS_OPENED,'Admin mở lại tài khoản');
    }
    

}