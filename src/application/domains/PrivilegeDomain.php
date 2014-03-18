<?php

defined('BASEPATH') or die('No direct script access allowed');

class PrivilegeDomain implements DomainInterface
{

    const TYPE_USER = 'user';
    const TYPE_ROLE = 'role';

    public $id;
    public $fkInstance;
    public $type;
    public $privilege;

}
