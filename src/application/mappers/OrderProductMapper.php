<?php

class OrderProductMapper extends ProductFixedMapper
{

    function __construct($domain = 'OrderProductDomain')
    {
        parent::__construct($domain);
        $this->_query->innerJoin('t_order_product op', 'op.fk_product=p.id');
    }

    function filterOrder($order_id)
    {
        $this->_query->where('fk_order=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $order_id;
        return $this;
    }
}
