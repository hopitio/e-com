<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductFixedMapper extends ProductMapper
{

    function __construct($domain = 'ProductFixedDomain')
    {
        parent::__construct($domain);
        $this->filterStatus(1);
    }

    function orderBySales($mode = 'DESC')
    {
        $this->_query
                ->select('pa_hot.value_number AS sales_count')
                ->innerJoin('t_product_attribute pa_hot', 'pa_hot.fk_product=p.id')
                ->innerJoin('t_product_attribute_type pat_hot', 'pa_hot.fk_attribute_type = pat_hot.id AND pat_hot.codename= ?')
                ->orderBy('pa_hot.value_number ' . $mode);
        $this->_queryParams[__FUNCTION__] = 'sales';
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return ProductFixedDomain
     */
    function findAll($callback = null)
    {
        return parent::findAll($callback);
    }

    function select($fields = 'p.*', $reset = false)
    {
        return parent::select($fields, $reset);
    }

    /**
     * 
     * @return ProductFixedDomain
     */
    function find($callback = null)
    {
        return parent::find($callback);
    }

}
