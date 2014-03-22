<?php

defined('BASEPATH') or die('No direct script access allowed');

class CartMapper extends ProductFixedMapper
{

    function __construct($domain = 'CartDomain')
    {
        parent::__construct($domain);
    }

}
