<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductFixedDomain extends ProductDomain
{

    /** @return ProductAttributeDomain */
    function getName()
    {
        return $this->_getAttributeByName('name');
    }

    function getSKU()
    {
        return $this->_getAttributeByName('SKU');
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
    function getImages()
    {
        return $this->_getAttributeByName('image');
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

    /** @return ProductAttributeDomain */
    function getPrice($currency)
    {
        $prices = $this->_getAttributeByName('price');
        if (!$prices)
        {
            return false;
        }
        foreach ($prices as $priceCurrency)
        {
            if (strtoupper($priceCurrency->valueVarchar) == strtoupper($currency))
            {
                return $priceCurrency;
            }
        }
        return false;
    }

    /**
     * Tính toán giá bán cuối cùng
     * @param type $currency
     * @return double
     */
    function calculatePrice($currency)
    {
        return ($this->getPrice($currency)->getTrueValue() - $this->discount);
    }

    function calculateTaxes($toCurrency = 'USD')
    {
        $total = 0;
        $price = $this->calculatePrice($toCurrency);
        foreach ($this->_taxes as $tax)
        {
            $total += $tax->costPercent * $price + $tax->costFixed;
        }
        return $total;
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
