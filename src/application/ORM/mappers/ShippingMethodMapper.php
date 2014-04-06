<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodMapper extends MapperAbstract
{

    protected $_autoloadShippingLocations = false;

    function __construct($domain = 'ShippingMethodDomain')
    {
        $query = Query::make()
                ->from('t_shipping_method')
                ->orderBy('id');

        $map = array(
            'fkCurrency' => 'fk_currency',
            'minBDay' => 'min_bday',
            'maxBDay' => 'max_bday',
            'currencyName' => 'currency_name'
        );

        parent::__construct($domain, $query, $map);
    }

    /**
     * 
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function find()
    {
        return parent::find();
    }

    function filterCodename($codename)
    {
        $this->_query->where('codename=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $codename;
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function findAll()
    {
        $domains = parent::findAll();
        if ($this->_autoloadShippingLocations)
        {
            /* @var $domains ShippingMethodDomain */
            foreach ($domains as $domain)
            {
                $shippingLocations = ShippingLocationMapper::make()->filterShippingMethod($domain->id)->findAll();
                foreach ($shippingLocations as $shippingLocationInstance)
                {
                    $domain->addShippingLocation($shippingLocationInstance);
                }
            }
        }
        return $domains;
    }

    function autoloadShippingLocation($bool)
    {
        $this->_autoloadShippingLocations = $bool;
        return $this;
    }

}
