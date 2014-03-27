<?php

defined('BASEPATH') or die('No direct script access allowed');

class ListMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()
                ->from('t_list')
                ->orderBy('sort');

        $map = array('fkListtype' => 'fk_listtype');

        parent::__construct('ListDomain', $query, $map);
    }

    /**
     * 
     * @param type $listtype id|codename
     * @param type $codename
     * @param type $fields
     * @return ListDomain
     */
    function findByCodeName($listtype, $codename, $fields = '*')
    {
        if (!is_numeric($listtype))
        {
            $listtype = $this->_getListtypeByCode($listtype);
        }
        $query = Query::make()->select($fields)->from('t_list')->where('fk_listtype=? And codename=?');
        $params = array($listtype, $codename);

        $record = DB::getInstance()->GetRow($query, $params);
        return $this->makeDomain($record);
    }

    /**
     * 
     * @param type $id
     * @param string $fields
     * @return ListDomain
     */
    function findById($id, $fields = '*')
    {
        $query = Query::make()->select($fields)->from('t_list')->where('id=?');
        $record = DB::getInstance()->GetRow($query, array($id));
        return $this->makeDomain($record);
    }

    function filterListtype($listtype)
    {
        if (!is_numeric($listtype))
        {
            $listtype = $this->_getListtypeByCode($listtype);
        }
        $this->_query->where('fk_listtype=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $listtype;
        return $this;
    }

    /**
     * @param string $codename
     * @return int
     */
    protected function _getListtypeByCode($codename)
    {
        return DB::getInstance()->getOne("SELECT id FROM t_listtype WHERE codename=?", array($codename));
    }

}
