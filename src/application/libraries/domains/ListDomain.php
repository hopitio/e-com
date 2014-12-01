<?php

defined('BASEPATH') or die('No direct script access allowed');

class ListDomain implements DomainInterface
{

    public $id;
    public $fkListtype;
    public $name;
    public $codename;
    public $sort;

    function __toString()
    {
        return (string)$this->name;
    }
}
