<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderProductDomain implements DomainInterface
{

    public $id;
    public $fkOrder;
    public $fkproduct;
    public $orginalPrice;
    public $price;
    public $quantity;
    public $discharge;

}
