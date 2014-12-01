<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserRoleDomain implements DomainInterface
{

    public $id;
    public $fkUser;
    public $fkRole;

}
