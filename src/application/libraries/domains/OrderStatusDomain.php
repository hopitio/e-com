<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderStatusDomain implements DomainInterface
{

    public $id;
    public $name;
    public $codename;
    public $sort;

}
