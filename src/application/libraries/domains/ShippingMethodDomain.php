<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodDomain implements DomainInterface
{

    public $id;
    public $fee;
    public $codename;
    public $fkCurrency;
    public $minBDay;
    public $maxBDay;
    public $currencyName;

}
