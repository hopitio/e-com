<?php

defined('BASEPATH') or die('No direct script access allowed');

class FeatureProductDomain extends ProductFixedDomain
{

    public $id;
    public $fkProduct;
    public $isOnHomepage;

    function isOneHomepage()
    {
        return ((bool) $this->isOnHomepage);
    }

}
