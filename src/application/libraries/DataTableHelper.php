<?php

class DataTableHelper
{

    public $start;
    public $length;
    public $search;

    public function __construct()
    {
        foreach (array_keys(get_object_vars($this)) as $prop)
        {
            if (isset($_GET[$prop]))
            {
                $this->{$prop} = $_GET[$prop];
            }
        }
    }

    function response($totalRecord, $aaData)
    {
        header('Content-type: application/json');
        return json_encode(array(
            'recordsTotal'    => $totalRecord,
            'recordsFiltered' => $totalRecord,
            'data'            => $aaData
        ));
    }

}
