<?php
/*
 * Base for all user
 * @author : ANLT 
 * @create : 20140521
 */
abstract class AbstractUser{
    public $is_authorized = false;
    public $id;
    public $firstname;
    public $lastname;
    protected abstract function getLoginAuthenUrl();
    
    /**
     * Lấy đường dẫn sử dụng để login
     */
    function getLoginUrl(){
        
        return $this->getLoginAuthenUrl();
    }
    
    /**
     * Lấy đường dẫn sử dụng để login.
     */
    static function getCurrentUser($is_admin = FALSE){

        $objUser = get_instance()->session->userdata(USER_SESSION);
        if($is_admin){
            if(is_a($objUser, 'UserAdmin')){
                return $objUser;
            }else{
                return new UserAdmin();
            }
            
        }else{
            if(is_a($objUser, 'User')){
                return $objUser;
            }else{
                return new User();
            }
        } 
    }
}