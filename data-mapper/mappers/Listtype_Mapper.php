<?php

defined('DS') or die;

class Listtype_Mapper extends Mapper
{

    function __construct()
    {
        parent::__construct('Listtype_Domain', new Query(array(
            'from' => 't_listtype',
            'where' => 'status=1'
        )));
    }

    /**
     * 
     * @param mixed $id_or_code
     * @param string $fields
     * @return \Listtype_Domain
     */
    function find($id_or_code, $fields = '*')
    {
        $query_options = array('select' => $fields, 'from' => 't_listtype');
        $query = new Query($query_options);
        is_numeric($id_or_code) ? $query->where('id=?') : $query->where('codename=?');
        $record = DB::get_instance()->GetRow($query, array($id_or_code));
        return $this->make_domain($record);
    }

}
