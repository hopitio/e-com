<?php

/**
 * Xử lý các liên quan đến việc xử login
 * @author ANLT
 * @since 20140426
 */
class PortalBizLogin extends PortalBizBase
{
    /**
     * Xử lý thao tác login bằng facebook.
     */
    function loginFacebook($facebookAccount)
    {
        $userModel = new PortalModelUser();
        $userModel->account = $facebookAccount->email;
        $result = $userModel->selectUserByUserName();
        $key = T_user::platform_key;
        if($result){
            if($userModel->$key == DatabaseFixedValue::USER_PLATFORM_FACEBOOK){
              return $this->setupSession($userModel);
            }
        }
        return $this->setupSession($userModel);
    }
    
    private function insertFacebookAccountToProtal($facebookAccount){
        $accountBiz = new PortalBizAccount();
        $firstname = $facebookAccount->first_name.' '.$facebookAccount->middle_name;
        $lastname = $facebookAccount->last_name;
        $account = $facebookAccount->email;
        $password = null;
        $genderFB =  $facebookAccount->gender;
        $sex = $genderFB == 'male' ? 'M' : $genderFB == 'female' ? 'F' : 0;
        $DOBFB = isset($facebookAccount->birthday) ? $facebookAccount->birthday : null;
        $DOB = $this->convertFbDate($DOBFB);
        $user = $accountBiz->insertNewUserFormPlatform($firstname, $lastname, $account, $password, $sex, $DOB,DatabaseFixedValue::USER_PLATFORM_FACEBOOK);
        return $user;
    }
    
    private function convertFbDate($DOBFB){
        if($DOBFB == null){
            return date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        }
        $date = new DateTime($DOBFB);
        return $date->format(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
    }
    
    /**
     * Xử lý login bằng tài khoản bình thường
     */
    function login($us,$pw){
        
    }

    /**
     * setup session.
     * @param PortalUserModel $resultAccount
     */
    function setupSession($resultAccount)
    {
        $user = new User();
        $user->is_authorized = true;
        $user->id =  $resultAccount->id;
        $user->account = $resultAccount->account;
        $user->firstname = $resultAccount->firstname;
        $user->lastname = $resultAccount->lastname;
        $user->sex = $resultAccount->sex;
        $user->platform_key = $resultAccount->platform_key;
        $user->status = $resultAccount->status;
        $user->last_active = $resultAccount->last_active;
        $user->DOB = $resultAccount->DOB;
        return $user;
    }
}