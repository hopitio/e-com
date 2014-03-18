<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductAttributeTypeMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()->from('t_product_attribute_type');
        $map = array(
            'dataType' => 'data_type',
            'fkEnumRef' => 'fk_enum_ref',
            'multiLanguage' => 'multi_language',
            'repeatingGroup' => 'repeating_group'
        );
        parent::__construct('ProductAttributeTypeMapper', $query, $map);
    }

    function filterMultiLanguage($on_off)
    {
        if ($on_off)
        {
            $this->_query->where("multi_language=1", __FUNCTION__);
        }
        else
        {
            $this->_query->where(null, __FUNCTION__);
        }
        return $this;
    }

    function filterRepeatingGroup($on_off)
    {
        if ($on_off)
        {
            $this->_query->where("repeating_group=1", __FUNCTION__);
        }
        else
        {
            $this->_query->where(null, __FUNCTION__);
        }
        return $this;
    }

}
