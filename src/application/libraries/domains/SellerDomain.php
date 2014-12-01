<?php

defined('BASEPATH') or die('No direct script access allowed');

class SellerDomain implements DomainInterface
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
    public $levelCode;
    public $levelName;
    public $commission;
    protected $categories = array();

    function isActive()
    {
        return ((bool) $this->status);
    }

    function setCategories($categories)
    {
        $this->categories = $categories;
    }

    function getCategories()
    {
        return $this->categories;
    }

    function addCategory(SellerCategoryDomain $cateogory)
    {
        $this->categories[] = $cateogory;
    }

}
