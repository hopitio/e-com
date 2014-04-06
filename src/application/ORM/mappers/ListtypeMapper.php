<?php

defined('BASEPATH') or die('No direct script access allowed');

class ListtypeMapper extends MapperAbstract
{

    function __construct()
    {
        parent::__construct('ListtypeDomain', new Query(array(
            'from' => 't_listtype'
        )));
    }

    function filterCodename($codename)
    {
        $this->_query->where('codename=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $codename;
        return $this;
    }

    /**
     * @param string $fields
     * @return ListtypeDomain
     */
    function find($fields = '*')
    {
        $query_options = array('select' => $fields, 'from' => 't_listtype');
        $query = new Query($query_options);

        is_numeric($id_or_code) ? $query->where('id=?') : $query->where('codename=?');
        $record = DB::getInstance()->GetRow($query, array($id_or_code));

        return $this->makeDomain($record);
    }

    function filterStatus($isActive = true)
    {
        $cond = $isActive ? 'status=1' : 'statis=0';
        $this->_query->where($cond, __FUNCTION__);
        return $this;
    }

}
