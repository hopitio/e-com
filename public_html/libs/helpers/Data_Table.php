<?php

defined('DS') or die;

class Data_Table
{

    public $sEcho;
    public $iTotalRecords;
    public $sSearch;
    public $iDisplayStart = 0;
    public $iDisplayLength;

    function __construct()
    {
        $this->sEcho = get_request_var('sEcho');
        $this->iTotalRecords = (int) get_request_var('iTotalRecords');
        $this->sSearch = get_request_var('sSearch');
        $this->iDisplayStart = (int) get_request_var('iDisplayStart', 0);
        $this->iDisplayLength = (int) get_request_var('iDisplayLength', Config::DEFAULT_ROWS_LIMIT);
    }

    /**
     * @param int $iTotalRecords
     * @param array $aaData
     * @return json
     */
    function response($iTotalRecords, $aaData)
    {
        return json_encode(array(
            'sEcho' => $this->sEcho,
            'iTotalRecords' => $iTotalRecords,
            'iTotalDisplayRecords' => $iTotalRecords,
            'aaData' => $aaData
        ));
    }

}
