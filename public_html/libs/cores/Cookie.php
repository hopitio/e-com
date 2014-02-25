<?php

defined('DS') or die;

class Cookie
{

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $hours
     */
    static function set($name, $value, $hours = null)
    {
        if ($hours == null)
        {
            $hours = Config::COOKIE_EXPIRE_HOURS;
        }
        //$_COOKIE[$name] = $value;
        //setcookie($name, $value, time() + $hours * 3600);
        setcookie($name, $value, time() + $hours * 3600, COnfig::COOKIE_PATH);
    }

    /**
     * 
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    static function get($name, $default, $escape = true)
    {
        $var = isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
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
     * Xóa biến
     * @param type $name
     */
    static function unset_var($name)
    {
        setcookie($name, null, time() - 10, Config::COOKIE_PATH);
        if (isset($_COOKIE[$name]))
        {
            unset($_COOKIE[$name]);
        }
    }

}
