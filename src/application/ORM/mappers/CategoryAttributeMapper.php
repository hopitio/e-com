<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryAttributeMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()
                ->from('t_category_attribute ca')
                ->innerJoin('t_product_attribute_type pat', 'ca.fk_attribute_type = pat.id');
        $map = array(
            'fkAttributeType' => 'fk_attribute_type',
            'fkCategory' => 'fa_category'
        );
        parent::__construct('CategoryAttributeDomain', $query, $map);
    }

    function select($fields = "ca.*, at.codename, at.datatype, at.fk_enum_ref, at.multi_language, at.repeating_group, at.weight, at.default")
    {
        parent::select($fields);
        return $this;
    }

    function findAll()
    {
        parent::findAll();
    }

    function filterCategoryID($categoryID)
    {
        $this->_query->where('ca.fk_category=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $categoryID;
        return $this;
    }

}
