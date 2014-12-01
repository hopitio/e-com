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

    function filterIdOrCode($idOrCode)
    {
        is_numeric($idOrCode) ? $this->_query->where('id=?', __FUNCTION__) : $this->_query->where('codename=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $idOrCode;
        return $this;
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
