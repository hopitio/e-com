<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodDomain implements DomainInterface
{

    public $id;
    public $codename;
    public $language;
    public $label;
    public $description;
    public $min_day;
    public $max_day;
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

    function get_estimate_min()
    {
        $now = date_create();
        return $now->add(new DateInterval('P' . $this->min_day . 'D'));
    }

    function get_estimate_max()
    {
        $now = date_create();
        return $now->add(new DateInterval('P' . $this->max_day . 'D'));
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
