<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingLocationDomain implements DomainInterface
{

    public $id;
    public $fkShippingMethod;
    public $fkLocation;
    public $price;
    public $priceCurrency;

}
