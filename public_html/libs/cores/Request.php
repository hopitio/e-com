<?php

defined('DS') or die;

class Request
{

    /** @var \Request */
    protected static $_instance;

    /** @var return \Request */
    static function get_instance()
    {
        if (!static::$_instance)
        {
            static::$_instance = new static;
        }
        return static::$_instance;
    }

    function __construct()
    {
        
    }

   

    /**
     * Lấy dữ liệu từ $_REQUEST
     * @param string $name
     * @param mixed $default
     * @param bool $escape
     * @return mixed
     */
    function get_request($name, $default = '', $escape = TRUE)
    {
        $var = isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
        if ($escape)
        {
            return escape_string($var);
        }
        return $var;
    }

    /**
     * Lấy từ $_POST
     * @param string $name
     * @param mixed $default
     * @param bool $escape
     * @return mixed
     */
    function get_post($name, $default = '', $escape = TRUE)
    {
        $var = isset($_POST[$name]) ? $_POST[$name] : $default;
        if ($escape)
        {
            return escape_string($var);
        }
        return $var;
    }

}
