<?php

defined('DS') or die;

class Request
{

    /**
     * Lấy dữ liệu từ $_REQUEST
     * @param string $name
     * @param mixed $default
     * @param bool $escape
     * @return mixed
     */
    static function get_request($name, $default = '', $escape = TRUE)
    {
        $var = isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
        if (!$escape)
        {
            return $var;
        }
        if (!is_array($var))
        {
            return escape_string($var);
        }
        else //array
        {
            array_walk_recursive($var, 'escape_string');
            return $var;
        }
    }

    /**
     * Lấy từ $_POST
     * @param string $name
     * @param mixed $default
     * @param bool $escape
     * @return mixed
     */
    static function get_post($name, $default = '', $escape = TRUE)
    {
        $var = isset($_POST[$name]) ? $_POST[$name] : $default;
        if (!$escape)
        {
            return $var;
        }
        if (!is_array($var))
        {
            return escape_string($var);
        }
        else //array
        {
            array_walk_recursive($var, 'escape_string');
            return $var;
        }
    }

}
