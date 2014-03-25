<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140325
 */
class PortalUserModel extends PortalBaseModel
{
    CONST TABLE_NAME = 't_user';
    public $id;
    public $firstname;
    public $lastname;
    public $account;
    public $password;
    public $sex;
    public $DOB;
    public $date_joined;
    public $status;
    public $status_date;
    public $status_reason;
    public $last_active;
    public $phoneno;
    public $bonus;
    public $alternative_email;
    
    /**
     * insert thêm một user mới
     */
    function insert()
    {
        $data = array(
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'account'=>$this->account,
            'password'=>$this->password,
            'sex'=>$this->sex,
            'DOB'=>$this->DOB,
            'date_joined'=>$this->date_joined,
            'status'=>$this->status,
            'status_date'=>$this->status_date,
            'status_reason'=>$this->status_reason,
            'last_active'=>$this->last_active,
            'phoneno'=>$this->phoneno,
            'bonus'=>$this->bonus,
            'alternative_email'=>$this->alternative_email
        );
        $this->_dbPortal->insert(self::TABLE_NAME,$data);
    }
}