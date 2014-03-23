<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistDomain implements DomainInterface
{

    public $id;
    public $fkCustomer;
    public $name;
    public $remindDate;
    public $note;
    public $dateCreated;

    /** @var WishlistDetailDomain */
    protected $_details = array();

    function addWishlistDetail(WishlistDetailDomain $child)
    {
        $this->_details[] = $child;
        return $this;
    }

    /** @return WishlistDetailDomain */
    function getDetails()
    {
        return $this->_details;
    }

}
