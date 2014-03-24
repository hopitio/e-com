<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductFixedMapper extends ProductMapper
{

    function __construct($domain = 'ProductFixedDomain')
    {
        parent::__construct($domain);
    }
    
    /** 
     * 
     * @param type $fields
     * @return ProductFixedDomain
     */
    function findAll($fields = 'p.*')
    {
        return parent::findAll($fields);
    }

}
