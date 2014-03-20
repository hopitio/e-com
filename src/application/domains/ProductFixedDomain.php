<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductFixedDomain extends ProductDomain
{

    /** @return ListDomain */
    function getName()
    {
        return $this->_getAttributeByName('name');
    }

    /** @return ListDomain */
    function getDescription()
    {
        return $this->_getAttributeByName('description');
    }

    /** @return ListDomain */
    function getTags()
    {
        return $this->_getAttributeByName('tag');
    }

    /** @return ListDomain */
    function getImages()
    {
        return $this->_getAttributeByName('image');
    }

    /** @return ListDomain */
    function getThumbnail()
    {
        return $this->_getAttributeByName('thumbnail');
    }

    /** @return ListDomain */
    function getBannerImage()
    {
        return $this->_getAttributeByName('banner_image');
    }

    /** @return ListDomain */
    function getGiftTarget()
    {
        return $this->_getAttributeByName('gift_target');
    }

    /** @return ListDomain */
    function getCategory()
    {
        return $this->_getAttributeByName('category');
    }

    /** @return ListDomain */
    function getOccasions()
    {
        return $this->_getAttributeByName('occasion');
    }

    /** @return ListDomain */
    function getPrice()
    {
        return $this->_getAttributeByName('price');
    }

    /** @return ListDomain */
    function getWeight()
    {
        return $this->_getAttributeByName('weight');
    }

    /** @return ListDomain */
    function getSource()
    {
        return $this->_getAttributeByName('source');
    }

    /** @return ListDomain */
    function getMaterials()
    {
        return $this->_getAttributeByName('material');
    }

}
