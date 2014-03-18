<?php

defined('BASEPATH') or die('No direct script access allowed');

class ListtypeDomain implements DomainInterface
{

    public $id;
    public $name;
    public $codename;
    public $status;

    function isActive()
    {
        return ((bool) $this->status);
    }

}
