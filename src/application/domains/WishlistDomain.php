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

    
}
