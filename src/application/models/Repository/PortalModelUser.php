<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140325
 */
class PortalModelUser extends PortalModelBase
{
    protected $_constIntanceName = 'T_user';
    public $id;
    public $full_name;
    public $account;
    public $password;
    public $sex;
    public $DOB;
    public $date_joined;
    public $status;
    public $status_date;
    public $status_reason;
    public $last_active;
    public $platform_key;
    public $user_type;
    public $phone;
    
    /**
     * insert thêm một user mới
     */
    function insert()
    {
        return parent::insert();
    }
    
    /**
     * Lấy dữ về user thông qua ID.
     * @param string $userId
     * @return bool true if have account, false if not found
     */
    function getUserByUserId()
    {
        $condition = array(T_user::id=>$this->id);
        $queryResult = $this->_dbPortal->get_where(T_user::tableName,$condition,1);
        if(count($queryResult->result()) == 0){
            return  false;
        }
        foreach($queryResult->result() as $row)
        {
            $this->id = $row->id;
            $this->full_name = $row->full_name;
            $this->last_active = $row->last_active;
            $this->account = $row->account;
            $this->password = $row->password;
            $this->sex = $row->sex;
            $this->DOB = $row->DOB;
            $this->date_joined = $row->date_joined;
            $this->status = $row->status;
            $this->status_date = $row->status_date;
            $this->status_reason = $row->status_reason;
            $this->last_active = $row->last_active;
            $this->platform_key = $row->platform_key;
            $this->user_type = $row->user_type;
            $this->phone = $row->phone;
            break;
            
        }
        return  true;
    }
    
//     /**
//      * Update user id.
//      */
//     function updateUser(){
//         $data = array(
//             T_user::firstname=>$this->firstname,
//             T_user::lastname=>$this->lastname,
//             T_user::account=>$this->account,
//             T_user::password=>$this->password,
//             T_user::sex=>$this->sex,
//             T_user::DOB=>$this->DOB,
//             T_user::date_joined=>$this->date_joined,
//             T_user::status=>$this->status,
//             T_user::status_date=>$this->status_date,
//             T_user::status_reason=>$this->status_reason,
//             T_user::last_active=>$this->last_active,
//             T_user::platform_key=>$this->platform_key,
//             T_user::user_type => $this->user_type
//         );
//         $this->_dbPortal->where(T_user::id,$this->id);
//         $this->_dbPortal->update(T_user::tableName,$data);
//     }
    
    /**
     * Lấy thông tin của user thông qua username.
     * @return mixed return false nếu như không có dữ liệu, trả về object User khi có dữ liệu; 
     */
    function selectUserByUserName()
    {
        $query = $this->_dbPortal->get_where(T_user::tableName,array(T_user::account=>$this->account),1);
        $result = $query->result();
        if(count($result) ==  0){
            return false;
        }else{
            $row = $result[0];
            $this->id = $row->id;
            $this->full_name = $row->full_name;
            $this->last_active = $row->last_active;
            $this->account = $row->account;
            $this->password = $row->password;
            $this->sex = $row->sex;
            $this->DOB = $row->DOB;
            $this->date_joined = $row->date_joined;
            $this->status = $row->status;
            $this->status_date = $row->status_date;
            $this->status_reason = $row->status_reason;
            $this->last_active = $row->last_active;
            $this->platform_key = $row->platform_key;
            $this->user_type = $row->user_type;
            $this->phone = $row->phone;
            return $result;
        }
        
    }
    
    /**
     * Lấy thông tin user thông qua username và password.
     * @return boolean|unknown
     */
    function selectUserByUserNameAndPassoword(){
        $query = $this->_dbPortal->get_where(T_user::tableName, 
            array(
                T_user::account => $this->account,
                T_user::password => $this->password
            ), 1);
        $result = $query->result();
        if(count($result) ==  0){
            return false;
        }else{
            $row = $result[0];
            $this->id = $row->id;
            $this->full_name = $row->full_name;
            $this->last_active = $row->last_active;
            $this->account = $row->account;
            $this->password = $row->password;
            $this->sex = $row->sex;
            $this->DOB = $row->DOB;
            $this->date_joined = $row->date_joined;
            $this->status = $row->status;
            $this->status_date = $row->status_date;
            $this->status_reason = $row->status_reason;
            $this->last_active = $row->last_active;
            $this->platform_key = $row->platform_key;
            $this->user_type = $row->user_type;
            $this->phone = $row->phone;
            return true;
        }
    }
    
    /**
     * 
     */
    function selectedUserViaAccount()
    {
        $query = $this->_dbPortal->get_where(T_user::tableName,
            array(
                T_user::account => $this->account
            ), 1);
        $result = $query->result();
        if(count($result) ==  0){
            return false;
        }else{
            $row = $result[0];
            $this->id = $row->id;
            $this->full_name = $row->full_name;
            $this->last_active = $row->last_active;
            $this->account = $row->account;
            $this->password = $row->password;
            $this->sex = $row->sex;
            $this->DOB = $row->DOB;
            $this->date_joined = $row->date_joined;
            $this->status = $row->status;
            $this->status_date = $row->status_date;
            $this->status_reason = $row->status_reason;
            $this->last_active = $row->last_active;
            $this->platform_key = $row->platform_key;
            $this->user_type = $row->user_type;
            $this->phone = $row->phone;
            return true;
        }
    }
    
    
    function findUsers($id,$account,$firstname,$lastname, $limit, $offset)
    {
        $sql = "SELECT * FROM t_user
                    WHERE 
                    	(t_user.id = ? OR t_user.id LIKE CONCAT('%',?,'%')) 
                    	AND 
                    	(t_user.firstname = ? OR t_user.firstname LIKE CONCAT('%',?,'%')) 
                    	AND
                    	(t_user.lastname = ? OR t_user.lastname LIKE CONCAT('%',?,'%')) 
                    	AND
                    	(t_user.account = ? OR t_user.account LIKE CONCAT('%',?,'%'))
                    LIMIT {$offset},{$limit}";
        $param = array($id,$id,$firstname,$firstname,$lastname,$lastname,$account,$account);
        $query = $this->_dbPortal->query($sql,$param);
        $results = $query->result();
        $users = array();
        foreach ($results as $result)
        {
            $user = new PortalModelUser();
            $user->autoMappingObj($result);
            $users[] = $user;
        }
        return $users;
    }

    function findUsersCount($id, $account, $firstname, $lastname)
    {
        $sql = "SELECT COUNT(id) as id FROM t_user
                WHERE
                (t_user.id = ? OR t_user.id LIKE CONCAT('%',?,'%'))
                AND
                (t_user.firstname = ? OR t_user.firstname LIKE CONCAT('%',?,'%'))
                AND
                (t_user.lastname = ? OR t_user.lastname LIKE CONCAT('%',?,'%'))
                AND
                (t_user.account = ? OR t_user.account LIKE CONCAT('%',?,'%'))";
        $param = array(
            $id,
            $id,
            $account,
            $account,
            $firstname,
            $firstname,
            $lastname,
            $lastname
        );
        $query = $this->_dbPortal->query($sql, $param);
        $results = $query->result();
        $usersCount = 0;
        foreach ($results as $result)
        {
             $usersCount = $result->id;
        }
        return $usersCount;
    }
    
    
    
}