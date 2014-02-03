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
        $this->sEcho = get_reqest_var('sEcho');
        $this->iTotalRecords = (int) get_reqest_var('iTotalRecords');
        $this->sSearch = get_reqest_var('sSearch');
        $this->iDisplayStart = (int) get_reqest_var('iDisplayStart', 0);
        $this->iDisplayLength = (int) get_reqest_var('iDisplayLength', Config::DEFAULT_ROWS_LIMIT);
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
