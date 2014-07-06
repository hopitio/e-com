<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodDomain implements DomainInterface
{

    public $id;
    public $codename;
    public $language;
    public $label;
    public $description;
    public $localization;
    protected $_shippingLocations = array();

    /**
     * 
     * @param ShippingLocationDomain $instance
     * @return LocationDomain
     */
    function addShippingLocation(ShippingLocationDomain $instance)
    {
        $this->_shippingLocations[] = $instance;
        return $this;
    }

    /**
     * 
     * @return ShippingLocationDomain
     */
    function getShippingLocations()
    {
        return $this->_shippingLocations;
    }

}
