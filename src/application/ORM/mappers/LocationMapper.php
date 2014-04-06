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

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return AdministrativeDomain
     */
    function findById($id, $fields = '*')
    {
        $query = Query::make()->select($fields)->from(static::TABLE)->where('id=?');
        $record = DB::getInstance()->GetRow($query, array($id));
        return $this->makeDomain($record);
    }

    /**
     * 
     * @param type $codename
     * @param type $fields
     * @return AdministrativeDomain
     */
    function findByCode($codename, $fields = '*')
    {
        $query = Query::make()->select($fields)->from(static::TABLE)->where('codename=?');
        $record = DB::getInstance()->GetRow($query, array($codename));
        return $this->makeDomain($record);
    }

    /**
     * 
     * @param type $fields
     * @return AdministrativeDomain
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
