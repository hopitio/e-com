<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()->from('t_product p');

        $map = array(
            'fkCategory' => 'fk_category',
            'fkRetailer' => 'fk_retailer',
            'fkGroup' => 'fk_group',
            'isGroup' => 'is_group',
        );

        parent::__construct('ProductMapper', $query, $map);
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

    function find($id, $fields = 'p.*')
    {
        
    }

    function findAll($fields = 'p.*')
    {
        return parent::findAll($fields);
    }

    protected function _getCategoryByCode($codename)
    {
        return DB::getInstance()->GetOne("SELECT id FROM t_category WHERE codename=?", array($codename));
    }

    function loadAttributes(ProductDomain $product)
    {
        foreach ($this->_loadNoRepeatAttributes($product->id) as $attr)
        {
            $product->addAttribute($attr);
        }
        foreach ($this->_loadRepeatAttributes($product->id) as $attr)
        {
            $product->addAttribute($attr);
        }
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadNoRepeatAttributes($product_id)
    {
        $attrMapper = ProductAttributeMapper::getInstance()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(false);
        return $attrMapper->findAll();
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadRepeatAttributes($product_id)
    {
        $attrMapper = ProductAttributeMapper::getInstance()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(true);
        return $attrMapper->findAll();
    }

}
