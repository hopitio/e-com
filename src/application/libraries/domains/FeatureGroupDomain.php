<?php

class FeatureGroupDomain implements DomainInterface
{

    public $id;
    public $codename;
    public $url;
    public $xmlLanguage;
    public $xmlImage;
    public $sort;
    public $name;
    protected $_products = array();
    protected $_images = array();

    function setProducts($products)
    {
        $this->_products = $products;
        return $this;
    }

    function getProducts()
    {
        return $this->_products;
    }

    function addImage($src, $title, $href)
    {
        $this->_images[] = array('src' => $src, 'title' => $title, 'href' => $href);
        return $this;
    }

    function getImages()
    {
        return $this->_images;
    }

}
