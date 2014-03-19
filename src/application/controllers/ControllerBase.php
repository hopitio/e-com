<?php
class BaseController extends MY_Controller{
    /**
     * Lấy thông tin Query string.
     * @return unknown
     */
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }
}