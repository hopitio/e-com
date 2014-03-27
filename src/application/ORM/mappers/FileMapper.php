<?php

defined('BASEPATH') or die('No direct script access allowed');

class FileMapper extends MapperAbstract
{

    function __construct($domain = 'FileDomain', $query = null, $map = null)
    {
        if (!$query)
        {
            $query = Query::make()->from('t_file')->orderBy('internal_path');
        }

        if (!$map)
        {
            $map = array(
                'fkUser' => 'fk_user',
                'fkParent' => 'fk_parent',
                'isDir' => 'is_dir',
                'dateModified' => 'date_modified',
                'internalPath' => 'internal_path'
            );
        }

        parent::__construct($domain, $query, $map);
    }

    /**
     * 
     * @param type $fields
     * @return FileDomain
     */
    function findAll($fields = '*')
    {
        return parent::findAll($fields);
    }

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return FileDomain
     */
    function find($id, $fields = '*')
    {
        $query = Query::make()->select($fields)->from('t_file')->where('id=?');
        $record = DB::getInstance()->GetRow($query, array($id));
        return $this->makeDomain($record);
    }

    function filterUser($userID)
    {
        $this->_query->where('fk_user=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $userID;
        return $this;
    }

    function filterAncestor($dirID)
    {
        $dirInstance = $this->find($dirID);
        if (!$dirInstance->id)
        {
            throw new Lynx_EmptyDataSetException();
        }
        $this->_query->where('internal_path LIKE ?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = "{$dirInstance->internalPath}%";
        return $this;
    }

    function filterParent($dirID)
    {
        $this->_query->where('fk_parent=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $dirID;
        return $this;
    }

    function filterNameLike($partOfName)
    {
        $this->_query->where('name LIKE ?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $partOfName;
        return $this;
    }

}
