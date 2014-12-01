<?php

defined('BASEPATH') or die('No direct script access allowed');

class RatingDomain implements DomainInterface
{

    public $id;
    public $fkUser;
    public $fkProduct;
    public $rate;

}
