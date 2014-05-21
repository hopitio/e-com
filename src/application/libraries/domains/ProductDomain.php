<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductDomain implements DomainInterface
{

    public $id;
    public $fkCategory;
    public $fkRetailer;
    public $fkGroup;
    public $isGroup;
    public $discount;
    public $dateCreated;
    public $countPin;
    public $countView;
    public $status;
    protected $_attributes = array();

    /** @var ProductImage */
    protected $_images = array();

    /** @var TaxDomain */
    protected $_taxes = array();

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

    function setImages($arr)
    {
        $this->_images = $arr;
        return $this;
    }

    function addImage(ProductImageDomain $img)
    {
        $this->_images[] = $img;
        return $this;
    }

    /**
     * 
     * @param string $type thumbnail | baseImage | smallImage | mainImage
     * @return ProductImageDomain
     */
    function getImages($type = null)
    {
        $ret = array();
        foreach ($this->_images as $img)
        {
            if ($type === null || $img->{$type} == 1)
            {
                $ret[] = $img;
            }
        }
        return $ret;
    }

    /**
     * @return ProductAttributeDomain
     */
    function attributes($name = null)
    {
        return ($name ? $this->_getAllAttributes() : $this->_getAttributeByName($name));
    }

    function addTax(TaxDomain $tax)
    {
        $this->_taxes[$tax->codename] = $tax;
    }

    /**
     * 
     * @param type $name
     * @return TaxDomain
     */
    function taxes($name = null)
    {
        if ($name)
        {
            return isset($this->_taxes[$name]) ? $this->_taxes[$name] : false;
        }
        else
        {
            return $this->_taxes;
        }
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
