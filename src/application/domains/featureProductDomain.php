<?php

defined('BASEPATH') or die('No direct script access allowed');

class featureProductDomain implements DomainInterface
{

    public $id;
    public $fkProduct;
    public $isOnHomepage;

    function isOneHomepage()
    {
        return ((bool) $this->isOnHomepage);
    }

}
