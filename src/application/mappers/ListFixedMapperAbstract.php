<?php

defined('BASEPATH') or die('No direct script access allowed');

abstract class ListFixedMapperAbstract extends ListMapper
{

    function __construct($listtypeCodeName)
    {
        parent::__construct();
        $listtypeInstance = ListtypeMapper::getInstance()->find($listtypeCodeName, 'id');
        $this->_query->where('fk_listtype=' . intval($listtypeInstance->id));
    }

}
