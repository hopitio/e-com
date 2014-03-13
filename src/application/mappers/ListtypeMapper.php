<?php

defined('BASEPATH') or die('No direct script access allowed');

class ListtypeMapper extends MapperAbstract
{

    function __construct()
    {
        parent::__construct('ListtypeDomain', new Query(array(
            'from' => 't_listtype',
            'where' => 'status=1'
        )));
    }

    /**
     * 
     * @param mixed $id_or_code
     * @param string $fields
     * @return \ListtypeDomain
     */
    function find($id_or_code, $fields = '*')
    {
        $query_options = array('select' => $fields, 'from' => 't_listtype');
        $query = new Query($query_options);
        is_numeric($id_or_code) ? $query->where('id=?') : $query->where('codename=?');
        $record = DB::getInstance()->GetRow($query, array($id_or_code));
        return $this->makeDomain($record);
    }

}
