<?php

defined('BASEPATH') or die('No direct script access allowed');

class LocationMapper extends MapperAbstract
{

    const TABLE = 't_location';

    function __construct($domain = 'LocationDomain')
    {
        $query = Query::make()->from(static::TABLE)->orderBy('codename');

        $map = array(
            'fkParent' => 'fk_parent'
        );

        parent::__construct($domain, $query, $map);
    }

    function filterIdOrCode($idOrCode)
    {
        is_numeric($idOrCode) ? $this->_query->where('id=?', __FUNCTION__) : $this->_query->where('code=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $idOrCode;
        return $this;
    }

    /**
     * @return LocationDomain
     */
    function find()
    {
        return parent::find();
    }

    /**
     * 
     * @param type $fields
     * @return LocationDomain
     */
    function findAll($fields = '*')
    {
        return parent::findAll($fields);
    }

    function filterLevel($level)
    {
        $this->_query->where('level=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $level;
        return $this;
    }

    function filterParent($parentId)
    {
        $this->_query->where('fk_parent=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $parentId;
        return $this;
    }

}
