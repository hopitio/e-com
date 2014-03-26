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
     * @param string $phoneno            
     */
    function insertNewUser($firstname, $lastname, $account, $password, $sex, 
        $DOB, $phoneno)
    {
        /**
         * status : 0 -> registed;
         * status : 1 -> available;
         * status : 2 -> closed;
         * status_reason default: Tạo mới tài khoản.
         */
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
        $userModel->phoneno = $phoneno;
        $userModel->bonus = 0;
        $userModel->alternative_email = $account;
        $userModel->insert();
    }
    
    /**
     * thêm user từ platform facebook....
     * @param unknown $firstname
     * @param unknown $lastname
     * @param unknown $account
     * @param unknown $password
     * @param unknown $sex
     * @param unknown $DOB
     * @param unknown $phoneno
     */
    function insertNewUserFormPlatform($firstname, $lastname, $account, $password, $sex, 
        $DOB, $phoneno){
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
        $userModel->phoneno = $phoneno;
        $userModel->bonus = 0;
        $userModel->alternative_email = $account;
        
        $newId = $userModel->insert();
        return $this->activeUser($newId);
    }

    /**
     * Kiểm tra dữ liệu login
     * @param string $username
     * @param string $password
     * @param string $formPlatform
     * @return 
     */
    function getLogin($username,$password,$formPlatform = false){
        $userModel = new PortalUserModel();
        $userModel->account = $username;
        $userModel->password = $password;
        $result;
        if($formPlatform){
            $result = $userModel->selectUserByUserNameAndPassoword();
        }else{
            $result = $userModel->selectUserByUserNameAndPassoword();
        }
        if ($result)
        {
            $this->setLoginUser();
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
}