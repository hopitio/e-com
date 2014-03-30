<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserAddressMapper extends MapperAbstract
{

    function __construct($domain = 'UserAddressDomain')
    {
        $query = Query::make()->from('t_user_address')->orderBy('count_used');

        $map = array(
            'fkUser' => 'fk_user',
            'dateCreated' => 'date_created',
            'dateUsed' => 'date_used',
            'countUsed' => 'count_used',
            'streetAddress' => 'street_address',
            'fkStateProvince' => 'fk_state_province',
            'city' => 'city',
            'zipPostalCode' => 'zip_postal_code',
            'vatNumber' => 'var_number'
        );

        parent::__construct($domain, $query, $map);
    }

    function filterUser()
    {
        
    }

}
