<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductMapper extends MapperAbstract
{

    protected $_autoloadAttributes = false;
    protected $_attributeLanguage = null;

    function __construct($domain = 'ProductDomain')
    {
        $query = Query::make()->from('t_product p');

        $map = array(
            'fkCategory' => 'fk_category',
            'fkRetailer' => 'fk_retailer',
            'fkGroup' => 'fk_group',
            'isGroup' => 'is_group',
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
    }

    /**
     * 
     * @param type $bool
     * @param type $language
     * @return static
     */
    function autoloadAttributes($bool = true, $language)
    {
        $this->_autoloadAttributes = $bool;
        $this->_attributeLanguage = $language;
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
        $product = parent::find();
        if ($this->_autoloadAttributes)
        {
            $this->loadAttributes($product, $this->_attributeLanguage);
        }
        return $product;
    }

    /**
     * 
     * @param type $fields
     * @return ProductDomain
     */
    function findAll($fields = 'p.*')
    {
        $products = parent::findAll($fields);
        if ($this->_autoloadAttributes)
        {
            foreach ($products as $p)
            {
                $this->loadAttributes($p, $this->_attributeLanguage);
            }
        }
        return $products;
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
