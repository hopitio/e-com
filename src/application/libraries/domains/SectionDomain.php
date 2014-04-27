<?php

defined('BASEPATH') or die('no direct script access allowed');

class SectionDomain implements DomainInterface
{

    public $id;
    public $displayImage;
    public $displayImageHref;
    public $displayImageTitle;
    public $name;
    public $description;
    protected $_products = array();

    function setProducts($products)
    {
        $this->_products = $products;
    }

    function getProducts()
    {
        return $this->_products;
    }

}
