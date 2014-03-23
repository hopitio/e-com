<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderMapper extends MapperAbstract
{

    function __construct($domain = 'OrderDomain')
    {
        $query = Query::make()->from('t_order');

        $map = array(
            'fkCustomer' => 'fk_customer',
            'subTotal' => 'sub_total',
            'fkOrderStatusHistory' => 'fk_order_status_history',
            'fkShippingMethod' => 'fk_shipping_method',
            'fkPaymentMethod' => 'fk_payment_method',
            'fkCurrency' => 'fk_currency',
            'dateCreated' => 'date_created'
        );

        parent::__construct($domain, $query, $map);
    }

    function filterCustomer($user_id)
    {
        $this->_query->where('fk_customer=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $user_id;
        return $this;
    }

    function filterOrderStatus($status_id)
    {
        $this->_query->where('fk_order_status_history=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $status_id;
        return $this;
    }

    /**
     * 
     * @param DateTime $from
     * @param DateTime $to
     * @return \OrderMapper
     */
    function filterDate(DateTime $from = null, DateTime $to = null)
    {
        $keyFrom = __FUNCTION__ . 'From';
        $keyTo = __FUNCTION__ . 'To';
        if ($from)
        {
            $this->_query->where('dateCreated >= ?', $keyFrom);
            $this->_queryParams[$keyFrom] = $from->format('Y-m-d H:i');
        }
        if ($to)
        {
            $this->_query->where('dateCreated <= ?', $keyTo);
            $this->_queryParams[$keyTo] = $from->format('Y-m-d H:i');
        }
        return $this;
    }

}