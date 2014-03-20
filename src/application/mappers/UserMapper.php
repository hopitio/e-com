<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserMapper extends MapperAbstract
{

    function __construct($domain = 'UserDomain')
    {
        $query = Query::make()->from('t_user');

        $map = array(
            'dateJoined' => 'date_joined',
            'statusDate' => 'status_date',
            'statusReason' => 'status_reason',
            'lastActive' => 'last_active'
        );
        
        parent::__construct($domain, $query, $map);
    }

    
    
}
