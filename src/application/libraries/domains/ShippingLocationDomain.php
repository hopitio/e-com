<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingLocationDomain implements DomainInterface
{

    public $id;
    public $fkShippingMethod;
    public $fkLocation;
    public $basePrice;
    public $baseWeight;
    public $weightStep;
    public $weightStepPrice;
    public $bulkyWeight;
    public $bulkyStepPrice;
    public $bulkyWeightStep;

}
