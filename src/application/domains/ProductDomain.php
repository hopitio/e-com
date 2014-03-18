<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductDomain implements DomainInterface
{

    public $id;
    public $fkCategory;
    public $fkRetailer;
    public $fkGroup;
    public $isGroup;
    protected $_attributes = array();

    function isGroup()
    {
        return ((bool) $this->isGroup);
    }

    function addAttribute(ProductAttributeDomain $attr)
    {
        if ($attr->isRepeatingGroup())
        {
            $this->_attributes[$attr->codename][] = $attr;
        }
        else
        {
            $this->_attributes[$attr->codename] = $attr;
        }
        return $this;
    }

    /**
     * @return ProductAttributeDomain
     */
    function attributes($name = null)
    {
        return ($name ? $this->_getAllAttributes() : $this->_getAttributeByName($name));
    }

    /**
     * @return ProductAttributeDomain
     */
    protected function _getAllAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return ProductAttributeDomain
     */
    protected function _getAttributeByName($name)
    {
        return (isset($this->_attributes[$name]) ? $this->_attributes[$name] : false);
    }



}
