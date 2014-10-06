<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingLocationMapper extends MapperAbstract
{

    function __construct($domain = 'ShippingLocationDomain')
    {
        $query = Query::make()->from('t_shipping_location');

        $map = array(
            'fkShippingMethod' => 'fk_shipping_method',
            'fkLocation'       => 'fk_location',
            'basePrice'        => 'base_price',
            'baseWeight'       => 'base_weight',
            'weightStep'       => 'weight_step',
            'weightStepPrice'  => 'weight_step_price',
            'bulkyWeight'      => 'bulky_weight',
            'bulkyStepPrice'   => 'bulky_step_price',
            'bulkyWeightStep'  => 'bulky_weight_step'
        );

        parent::__construct($domain, $query, $map);
    }

    /**
     * @return ShippingLocationDomain
     */
    function find($callback = null)
    {
        return parent::find($callback);
    }

    /**
     * 
     * @param type $fields
     * @return ShippingLocationDomain
     */
    function findAll($callback = null)
    {
        return parent::findAll($callback);
    }

    function filterShippingMethod($shippingMethodID)
    {
        $this->_query->where('fk_shipping_method=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $shippingMethodID;
        return $this;
    }

    function filterLocation($locationID = null, $locationCode = null)
    {
        if (!$locationID && $locationCode)
        {
            $locationID = DB::getInstance()->GetOne('SELECT id FROM t_location WHERE codename=?', array($locationCode));
        }
        $this->_query->where('fk_location=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $locationID;
        return $this;
    }

}
