<?php

class BizUser extends BaseBiz{
    
    
    function processLoginFromPortal($dataDecode){
        $user = new User();
        $db = DB::getInstance();
        
        $query = Query::make()
        ->select('id,user_type')
        ->from('t_user')
        ->where('portal_id = ?');
        $queryResult = DB::getInstance()->GetRow($query, array($dataDecode->id));
        $userID = null;
        $userType = DatabaseFixedValue::USER_TYPE_USER;
        if (!$queryResult)
        {
            $userID = DB::insert('t_user', array(
            'portal_id' => $dataDecode->id,
            'platform_key'    => $dataDecode->platform_key,
            'is_admin' => DatabaseFixedValue::USER_TYPE_USER,
            'created_date' => date(DatabaseFixedValue::DEFAULT_FORMAT_DATE)
            ));
        }else{
            $userID = $queryResult['id'];
            $userType = $queryResult['user_type'];
        }
        $user->id = $userID;
        $user->portal_id = $dataDecode->id;
        $user->account = $dataDecode->account;
        $user->date_joined = $dataDecode->date_joined;
        $user->DOB = $dataDecode->DOB;
        $user->firstname = $dataDecode->firstname;
        $user->languageKey =$dataDecode->languageKey;
        $user->last_active =$dataDecode->last_active;
        $user->lastname =$dataDecode->lastname;
        $user->platform_key =$dataDecode->platform_key;
        $user->sex = $dataDecode->sex;
        $user->status = $dataDecode->status;
        $user->secretKey = $dataDecode->secretKey;
        $user->is_authorized = true;
        $user->user_type = $userType;
        $user->sub_id = $userID;
        return $user;
    }
    
} 