<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140325
 */
class PortalUserModel extends PortalBaseModel
{
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
            T_user::firstname=>$this->firstname,
            T_user::lastname=>$this->lastname,
            T_user::account=>$this->account,
            T_user::password=>$this->password,
            T_user::sex=>$this->sex,
            T_user::DOB=>$this->DOB,
            T_user::date_joined=>$this->date_joined,
            T_user::status=>$this->status,
            T_user::status_date=>$this->status_date,
            T_user::status_reason=>$this->status_reason,
            T_user::last_active=>$this->last_active,
            T_user::phoneno=>$this->phoneno,
            T_user::bonus=>$this->bonus,
            T_user::alternative_email=>$this->alternative_email
        );
        $this->_dbPortal->insert(T_user::tableName,$data);
        return $this->_dbPortal->insert_id();
    }
    
    /**
     * Lấy dữ về user thông qua ID.
     * @param string $userId
     * @return bool true if have account, false if not found
     */
    function getUserByUserId($userId)
    {
        $condition = array(T_user::id=>$userId);
        $queryResult = $this->_dbPortal->get_where(T_user::tableName,$condition,1,1);
        if(count($query->result()) == 0){
            return  false;
        }
        foreach($query->result() as $row)
        {
            foreach ($row as $key){
                 if(isset($this->$key)){
                    $this->$key = $row[$key];
                 }else {
                    throw new Lynx_DatabaseQueryException(__CLASS__.'::getUserByUserId::Database và model không khớp');
                 }
            }
        }
        return  true;
    }
    
    /**
     * Update user id.
     */
    function updateUser(){
        $data = array(
            T_user::firstname=>$this->firstname,
            T_user::lastname=>$this->lastname,
            T_user::account=>$this->account,
            T_user::password=>$this->password,
            T_user::sex=>$this->sex,
            T_user::DOB=>$this->DOB,
            T_user::date_joined=>$this->date_joined,
            T_user::status=>$this->status,
            T_user::status_date=>$this->status_date,
            T_user::status_reason=>$this->status_reason,
            T_user::last_active=>$this->last_active,
            T_user::phoneno=>$this->phoneno,
            T_user::bonus=>$this->bonus,
            T_user::alternative_email=>$this->alternative_email
        );
        $this->_dbPortal->where(T_user::id,$this->id);
        $this->_dbPortal->update(T_user::tableName,$data);
    }
    
    /**
     * Lấy thông tin của user thông qua username.
     * @return mixed return false nếu như không có dữ liệu, trả về object User khi có dữ liệu; 
     */
    function selectUserByUserName()
    {
        $query = $this->_dbPortal->get_where(T_user::account,array(T_user::account=>$this->account),1,1);
        $result = $query->result();
        if(count($result) ==  0){
            return false;
        }else{
            return $result;
        }
        
    }
    
    /**
     * Lấy thông tin user thông qua username và password.
     * @return boolean|unknown
     */
    function selectUserByUserNameAndPassoword(){
        $query = $this->_dbPortal->get_where(T_user::account, 
            array(
                T_user::account => $this->account,
                T_user::password => $this->password
            ), 1, 1);
        $result = $query->result();
        if(count($result) ==  0){
            return false;
        }else{
            return $result;
        }
    }
}