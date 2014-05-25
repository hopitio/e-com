<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductFixedDomain extends ProductDomain
{

    /** @return ProductAttributeDomain */
    function getName()
    {
        return $this->_getAttributeByName('name');
    }

    function getStorageCode()
    {
        return $this->_getAttributeByName('storage_code');
    }

    function getStorageCodeType()
    {
        return $this->_getAttributeByName('storage_code_type');
    }

    /** @return ProductAttributeDomain */
    function getDescription()
    {
        return $this->_getAttributeByName('description');
    }

    /** @return ProductAttributeDomain */
    function getTags()
    {
        return $this->_getAttributeByName('tag');
    }

    /** @return ProductAttributeDomain */
    function getThumbnail()
    {
        return $this->_getAttributeByName('thumbnail');
    }

    /** @return ProductAttributeDomain */
    function getBannerImage()
    {
        return $this->_getAttributeByName('banner_image');
    }

    /** @return ProductAttributeDomain */
    function getGiftTarget()
    {
        return $this->_getAttributeByName('gift_target');
    }

    /** @return ProductAttributeDomain */
    function getCategory()
    {
        return $this->_getAttributeByName('category');
    }

    /** @return ProductAttributeDomain */
    function getOccasions()
    {
        return $this->_getAttributeByName('occasion');
    }

    /**
     * 
     * @param string $currency [optional] default 'USD'
     * @return Money
     */
    function getPriceMoney($currency = 'USD')
    {
        $attr = $this->_getAttributeByName('price');
        $price = $attr ? $attr->getTrueValue() : 0;
        $money = new Money($price, new Currency('VND'));

        return $money->convert(new Currency($currency));
    }

    function getMetaTitle()
    {
        return $this->_getAttributeByName('meta_title');
    }

    function getMetaKeywords()
    {
        return $this->_getAttributeByName('meta_keywords');
    }

    function getMetaDescription()
    {
        return $this->_getAttributeByName('meta_description');
    }

    /**
     * 
     * @param string $toCurrency [optional] default 'VND'
     * @return Money
     */
    function calculateTaxes($toCurrency = 'USD')
    {
        $total = new Money(0, new Currency('VND'));
        $price = $this->getPriceMoney('VND');
        foreach ($this->_taxes as $tax)
        {
            $total = $total->add($price->multiply($tax->costPercent))->add(new Money($tax->costFixed, new Currency('VND')));
        }
        return $total->convert(new Currency($toCurrency));
    }

    /**
     * @param string $currency [optional] default 'VND'
     * @return Money
     */
    function getFinalPriceMoney($currency = 'USD')
    {
        return $this->getPriceMoney($currency)->add($this->calculateTaxes($currency));
    }

    /** @return ProductAttributeDomain */
    function getWeight()
    {
        return $this->_getAttributeByName('weight');
    }

    /** @return ProductAttributeDomain */
    function getSource()
    {
        return $this->_getAttributeByName('source');
    }

    /** @return ProductAttributeDomain */
    function getMaterials()
    {
        return $this->_getAttributeByName('material');
    }

    /** @return ProductAttributeDomain */
    function getQuantity()
    {
        return $this->_getAttributeByName('quantity');
    }

    /** @return ProductAttributeDomain */
    function isAvailable()
    {
        return ((bool) $this->getQuantity());
    }

}
