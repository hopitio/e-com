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
    function find($callback = null)
    {
        return parent::find($callback);
    }

    function filterStatus($isActive = true)
    {
        $cond = $isActive ? 'status=1' : 'statis=0';
        $this->_query->where($cond, __FUNCTION__);
        return $this;
    }

}
