<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodMapper extends MapperAbstract
{

    protected $_autoloadShippingLocations = false;
    protected $_language;

    function __construct($domain = 'ShippingMethodDomain')
    {
        $query = Query::make()
                ->from('t_shipping_method')
                ->orderBy('sort');

        $map = array();

        parent::__construct($domain, $query, $map);
    }

    function setLanguage($languageCode)
    {
        $this->_language = $languageCode;
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function find($callback = null)
    {
        return parent::find($callback);
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
    function findAll($callback = null)
    {
        $domains = parent::findAll($callback);
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
        foreach ($domains as $domain)
        {
            if (!$domain->localization)
            {
                continue;
            }
            $dom_localization = simplexml_load_string($domain->localization);
            $language = strtolower(str_replace('-', '_', $this->_language));
            $dom_language = $dom_localization->{$language};
            $domain->label = (string) $dom_language->label;
            $domain->description = (string) $dom_language->description;
        }
        return $domains;
    }

    function autoloadShippingLocation($bool)
    {
        $this->_autoloadShippingLocations = $bool;
        return $this;
    }

}
