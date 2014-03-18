<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductAttributeMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()
                ->from('t_product_attribute pa')
                ->innerJoin('t_product_attribute_type pat', 'pa.fk_attribute_type = pat.id');

        $map = array(
            'fkProduct' => 'fk_product',
            'fkAttributeType' => 'fk_attribute_type',
            'valueNumber' => 'value_number',
            'valueEnum' => 'value_enum',
            'valueText' => 'value_text',
            'valueVarchar' => 'value_varchar',
            'dataType' => 'data_type',
            'fkEnumRef' => 'fk_enum_ref',
            'multiLanguage' => 'multi_language',
            'repeatingGroup' => 'repeating_group'
        );

        parent::__construct('ProductAttributeDomain', $query, $map);
    }

    function filterProduct($product_id)
    {
        $this->_query->where('fk_product=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $product_id;
        return $this;
    }

    function filterRepeatingGroup($is_repeating_group = true)
    {
        $condition = $is_repeating_group ? 'repeating_group=1' : 'repeating_group=0';
        $this->_query->where($condition, __FUNCTION__);
        return $this;
    }

}