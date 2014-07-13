<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserModel extends BaseModel
{
    function getUserbyId($userId){
        $query = Query::make()->from('t_user')->where(" t_user.id = ? ");
        $queryInclude = array(
            $userId
        );
        return DB::getInstance()->GetAll($query,$queryInclude);
    }
}
