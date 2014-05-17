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
    function insertNewUserNormal($user,$firstname, $lastname, $account, $password, $sex, 
        $DOB, $question = '', $answer = '')
    {
        $newId = $this->insertNewUser($user,$firstname, $lastname, $account, $password, $sex, $DOB, DatabaseFixedValue::USER_PLATFORM_DEFAULT,$question, $answer);
        //$this->activeUser($newId);
        $portalUserModel = new PortalModelUser();
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
    function insertNewUserFormPlatform($user,$firstname, $lastname, $account, $password, $sex, 
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
    private function insertNewUser($user,$firstname, $lastname, $account, $password, 
        $sex, $DOB, $platformKey, $question = '', $answer = '')
    {
        $userModel = new PortalModelUser();
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
        $user->firstname = $userModel->firstname;
        $user->lastname = $userModel->lastname;
        $user->last_active = $userModel->last_active;
        $user->lastname = $userModel->lastname;
        $user->platform_key = $userModel->platform_key;
        $user->sex = $userModel->sex;
        $user->status = $userModel->status;
        return $user;
    }
    
    /**
     * Kiểm tra dữ liệu login
     * @param string $username
     * @param string $password
     * @param string $formPlatform
     * @return 
     */
    function getLogin($username,$password,$formPlatform = null,$toSubsys = null,$subSystemSessionId = null){
        $userModel = new PortalModelUser();
        $userModel->account = $username;
        $userModel->password = $password;
        $formPlatform = $formPlatform == null ? DatabaseFixedValue::USER_PLATFORM_DEFAULT : $formPlatform;
        $result = $formPlatform == DatabaseFixedValue::USER_PLATFORM_DEFAULT ? $userModel->selectUserByUserNameAndPassoword() : $userModel->selectUserByUserName();
        if ($result)
        {
            $user = new User();
            $portalModelUserSetting = new PortalModelUserSetting();
            $portalModelUserSetting->fk_user = $user->id;
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
            $user = $this->mappingModelWithUser($user,$userModel);
            log_message('error',var_export($user,true));
            return $user;
        }
        else
        {
            return false;
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
        $userModel->status_date = date(DatabaseFixedValue::USER_STATUS_OPENED);
        $userModel->status_reason = $reason;
        $userModel->updateUser();
        
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
    function updateUserInformation($user,$fristName, $lastName,$dob,$sex){
        $portalUserModel = new PortalModelUser();
        $portalUserModel->id = $user->id;
        $portalUserModel->getUserByUserId();
        $portalUserModel->firstname = $fristName;
        $portalUserModel->lastname = $lastName;
        $portalUserModel->DOB = $dob;
        $portalUserModel->sex = $sex;
        $portalUserModel->updateUser();
        
        $portalUserHistoryBiz = new PortalBizUserHistory();
        $portalUserHistoryBiz->createNewHistory($user,DatabaseFixedValue::USER_HISTORY_ACTION_CHANGEINFORMATION ,'Thay đổi thông tin cá nhân',null,null);
        
        $user = new User();
        $user = $this->mappingModelWithUser($user,$portalUserModel);
        
        return $user;
    }
    
    function findUser($userId,$account,$firstName,$lastname, $limit, $offset){
        $portalModel  = new PortalModelUser();
        return $portalModel->findUsers($userId, $account, $firstName, $lastname, $limit, $offset);
    }
    function findUserCount($userId,$account,$firstName,$lastname){
        $portalModel  = new PortalModelUser();
        return $portalModel->findUsersCount($userId, $account, $firstName, $lastname);
    }

}