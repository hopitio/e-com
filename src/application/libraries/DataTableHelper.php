<?php

class DataTableHelper
{

    public $sEcho;
    public $iColumns;
    public $sColumns;
    public $iDisplayStart;
    public $iDisplayLength;
    public $sSearch;
    public $bRegex;

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
        echo json_encode(array(
            'sEcho'                => $this->sEcho,
            'iTotalRecords'        => $totalRecord,
            'iTotalDisplayRecords' => $totalRecord,
            'aaData'               => $aaData
        ));
    }

}
