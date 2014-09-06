<?php

class FeatureGroupDomain implements DomainInterface
{

    public $id;
    public $codename;
    public $url;
    public $xmlLanguage;
    public $sort;
    public $name;
    protected $_details = array();

    function setDetails($arr)
    {
        $this->_details = $arr;
        return $this;
    }

    function getDetails()
    {
        return $this->_details;
    }

}
