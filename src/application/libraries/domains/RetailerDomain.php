<?php

defined('BASEPATH') or die('No direct script access allowed');

class RetailerDomain implements DomainInterface
{

    public $id;
    public $name;
    public $logo;
    public $phoneno;
    public $email;
    public $website;
    public $status;
    public $statusDate;
    public $statusReason;
    public $fkManager;

    function isActive()
    {
        return ((bool) $this->status);
    }

}
