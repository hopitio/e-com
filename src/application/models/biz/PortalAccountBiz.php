<?php
/**
 * Xử lý các biz liên quan đến việc tương tác với tài khoản.
 * @author ANLT
 * @since 20140425
 */
class PortalAccountBiz extends PortalBaseBiz
{

    function __construct(){
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
        $userModel->date_joined = date('YYYY-MM-DD HH:MM:SS');
        $userModel->status = 0;
        $userModel->status_date = date('YYYY-MM-DD HH:MM:SS');
        $userModel->status_reason = 'Tạo mới tài khoản';
        $userModel->last_active = date('YYYY-MM-DD HH:MM:SS');
        $userModel->phoneno = $phoneno;
        $userModel->bonus = 0;
        $userModel->alternative_email = $account;
        $userModel->insert();
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
}