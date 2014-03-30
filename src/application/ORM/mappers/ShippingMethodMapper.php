<?php

defined('BASEPATH') or die('No direct script access allowed');

class ShippingMethodMapper extends MapperAbstract
{

    function __construct($domain = 'ShippingMethodDomain')
    {
        $query = Query::make()
                ->from('t_shipping_method sm')
                ->innerJoin('t_list lt', 'sm.fk_currency=lt.id')
                ->orderBy('sm.id');

        $map = array(
            'fkCurrency' => 'fk_currency',
            'minBDay' => 'min_bday',
            'maxBDay' => 'max_bday',
            'currencyName' => 'currency_name'
        );

        parent::__construct($domain, $query, $map);
    }

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function findById($id, $fields = 'sm.*,lt.codename AS currency_name')
    {
        $query = Query::make()
                ->select($fields)
                ->from('t_shipping_method sm')
                ->innerJoin('t_list lt', 'sm.fk_currency=lt.id')
                ->where('id=?', array($id));
        $record = DB::getInstance()->GetRow($query);
        return $this->makeDomain($record);
    }

    /**
     * 
     * @param type $codename
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function findByCode($codename, $fields = 'sm.*,lt.codename AS currency_name')
    {
        $query = Query::make()
                ->select($fields)
                ->from('t_shipping_method sm')
                ->innerJoin('t_list lt', 'sm.fk_currency=lt.id')
                ->where('codename=?', array($codename));
        $record = DB::getInstance()->GetRow($query);
        return $this->makeDomain($record);
    }

    /**
     * 
     * @param type $fields
     * @return ShippingMethodDomain
     */
    function findAll($fields = 'sm.*,lt.codename AS currency_name')
    {
        return parent::findAll($fields);
    }

}
