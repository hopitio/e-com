<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductMapper extends MapperAbstract
{

    protected $_autoloadAttributes = false;
    protected $_attributeLanguage  = null;
    protected $_autoloadTaxes      = false;

    function __construct($domain = 'ProductDomain')
    {
        $query = Query::make()->from('t_product p');

        $map = array(
            'fkCategory' => 'fk_category',
            'fkRetailer' => 'fk_retailer',
            'fkGroup'    => 'fk_group',
            'isGroup'    => 'is_group',
        );

        parent::__construct($domain, $query, $map);
    }

    function filterCategory($category)
    {
        if (!is_numeric($category))
        {
            $category = $this->_getCategoryByCode($category);
        }
        $this->_query->where('p.fk_category=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $category;
        return $this;
    }

    function filterSeller($sellerID)
    {
        $this->_query->where('p.fk_seller=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $sellerID;
        return $this;
    }

    function setLanguage($lang)
    {
        $this->_attributeLanguage = $lang;
        return $this;
    }

    /**
     * 
     * @param type $bool
     * @return static
     */
    function autoloadAttributes($bool = true)
    {
        $this->_autoloadAttributes = $bool;
        return $this;
    }

    function autoloadTaxes($bool = true)
    {
        $this->_autoloadTaxes = $bool;
        return $this;
    }

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return ProductDomain
     */
    function find()
    {
        return parent::find();
    }

    function makeDomainCallback(&$domainInstance)
    {
        parent::makeDomainCallback($domainInstance);
        if ($this->_autoloadAttributes)
        {
            $this->loadAttributes($domainInstance);
        }
        if ($this->_autoloadTaxes)
        {
            $this->loadTaxes($domainInstance);
        }
    }

    /**
     * 
     * @param type $fields
     * @return ProductDomain
     */
    function findAll()
    {
        return parent::findAll();
    }

    protected function _getCategoryByCode($codename)
    {
        return DB::getInstance()->GetOne("SELECT id FROM t_category WHERE codename=?", array($codename));
    }

    function loadAttributes(ProductDomain $product, $language = null)
    {
        foreach ($this->_loadNoRepeatAttributes($product->id, $language) as $attr)
        {
            $product->addAttribute($attr);
        }
        foreach ($this->_loadRepeatAttributes($product->id, $language) as $attr)
        {
            $product->addAttribute($attr);
        }
    }

    /**
     * 
     * @param ProductDomain $domain
     */
    function loadTaxes(&$domain)
    {
        $taxes = TaxMapper::make()->setLanguage($this->_attributeLanguage)->filterProduct($domain->id)->findAll();
        foreach ($taxes as $tax)
        {
            $domain->addTax($tax);
        }
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadNoRepeatAttributes($product_id, $language = null)
    {
        $attrMapper = ProductAttributeMapper::make()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(false)
                ->setLanguage($language);
        return $attrMapper->findAll();
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadRepeatAttributes($product_id, $language = null)
    {
        $attrMapper = ProductAttributeMapper::make()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(true)
                ->setLanguage($language);
        return $attrMapper->findAll();
    }

}
