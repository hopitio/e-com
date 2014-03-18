<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserDomain implements DomainInterface
{

    public $id;
    public $firstname;
    public $lastname;
    public $account;
    public $password;
    public $sex;
    public $DOB;
    public $dateJoined;
    public $status;
    public $statusDate;
    public $statusReason;
    public $lastActive;
    public $isAdmin;
    public $phoneno;
    public $bonus;
    public $email;

    function isAdmin()
    {
        return ((bool) $this->isAdmin);
    }

    function getFullName()
    {
        
    }

    function checkPassword($password)
    {
        
    }

}
