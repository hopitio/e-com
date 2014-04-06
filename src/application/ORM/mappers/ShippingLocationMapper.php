<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingLocationMapper extends MapperAbstract
{

    function __construct($domain = 'ShippingLocationMapper')
    {
        $query = Query::make()->from('t_shipping_location');

        $map = array(
            'fkShippingLocation' => 'fk_shipping_location',
            'fkLocation' => 'fk_location',
            'priceCurrency' => 'price_currency'
        );

        parent::__construct($domain, $query, $map);
    }

    /**
     * @return ShippingLocationDomain
     */
    function find()
    {
        return parent::find();
    }

    /**
     * 
     * @param type $fields
     * @return ShippingLocationDomain
     */
    function findAll()
    {
        return parent::findAll();
    }

    function filterShippingMethod($shippingMethodID)
    {
        $this->_query->where('fk_shipping_method=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $shippingMethodID;
        return $this;
    }

    function filterLocation($locationID)
    {
        $this->_query->where('fk_location=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $locationID;
        return $this;
    }

}
