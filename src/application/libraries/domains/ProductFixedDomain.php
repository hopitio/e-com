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

    function sum_taxes($currency)
    {
        $total = 0;
        foreach ($this->_taxes as $tax)
        {
            $total+= $tax->costFixed + $tax->costPercent * $this->getPriceMoney('VND')->getAmount();
        }
        $money = new Money($total, new Currency('VND'));
        return $money->convert(new Currency($currency))->getAmount();
    }

    /** @return ProductAttributeDomain */
    function getNote()
    {
        return $this->_getAttributeByName('note');
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

    function getWarrantyPolicy()
    {
        return $this->_getAttributeByName('warranty_policy');
    }

    function getReturnPolicy()
    {
        return $this->_getAttributeByName('return_policy');
    }

    function getMadeIn()
    {
        return $this->_getAttributeByName('made_in');
    }

    function getImportFrom()
    {
        return $this->_getAttributeByName('import_from');
    }

    function getDimensionWidth()
    {
        return $this->_getAttributeByName('dimension_width');
    }

    function getDimensionHeight()
    {
        return $this->_getAttributeByName('dimension_height');
    }

    function getDimensionDepth()
    {
        return $this->_getAttributeByName('dimension_depth');
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
        $amount = $this->price;
        $money = new Money($amount, new Currency('VND'));

        return $money->convert(new Currency($currency));
    }

    function getPriceOrigin($currency = 'USD')
    {
        $amount = $this->priceOrigin;
        $money = new Money($amount, new Currency('VND'));
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

    function getSalesPercent()
    {
        $price = $this->getPriceMoney('VND')->getAmount();
        $origin = $this->getPriceOrigin('VND')->getAmount();
        $balance = max(array($origin - $price, 0));
        return floor($balance * 100 / $origin);
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
    function getWeightUnit()
    {
        return $this->_getAttributeByName('weight_unit');
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

    function getBrand()
    {
        return $this->_getAttributeByName('brand');
    }

    /** @return ProductAttributeDomain */
    function isAvailable()
    {
        return ((bool) $this->getQuantity());
    }


    /**
     * Trọng lượng quy đổi bằng max(trọng lượng kq, x*y*z/6000)
     */
    function getConvertedWeight()
    {
        $weight = (string) $this->getWeight();
        $x = (string) $this->getDimensionWidth();
        $y = (string) $this->getDimensionHeight();
        $z = (string) $this->getDimensionDepth();
        return max(array($weight, $x * $y * $z / 6000));
    }

}
