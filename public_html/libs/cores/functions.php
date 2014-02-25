<?php

defined('DS') or die;

/**
 * Loại bỏ ký tự đặc biệt
 * @param string $str
 * @return string
 */
function escape_string($str)
{
    $arr_search = array('&', '<', '>', '"', "'", '/', "\\");
    $arr_replace = array();
    foreach ($arr_search as $v)
    {
        $arr_replace[] = htmlentities($v);
    }
    return str_replace($arr_search, $arr_replace, $str);
}

/**
 * Lấy dữ liệu từ array
 * @param array $array
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function get_array_value($array, $key, $default)
{
    return isset($array[$key]) ? $array[$key] : $default;
}

        const XPATH_ARRAY = 1;
        const XPATH_OBJECT = 2;
        const XPATH_STRING = 3;

/**
 * Không tìm thấy cũng trả về dữ liệu, tránh lỗi lập trình
 * @param SimpleXMLElement $simplexml
 * @param string $xpath
 * @param int $mode
 * @param mixed $default
 * @return \SimpleXMLElement[]
 */
function xpath($simplexml, $xpath, $mode = XPATH_ARRAY, $default = null)
{
    if ($simplexml == false) //validate
    {
        switch ($mode)
        {
            case XPATH_ARRAY:
                return array();
            case XPATH_OBJECT:
                return new SimpleXMLElement;
            case XPATH_STRING:
                return $default;
            default:
                throw new Exception('$mode Phải dùng CONST. VD: XPATH_ARRAY');
        }
    }

    $arr_results = $simplexml->xpath($xpath);
    switch ($mode)
    {
        case XPATH_ARRAY:
            return $arr_results;
        case XPATH_OBJECT:
            return isset($arr_results[0]) ? $arr_results[0] : new SimpleXMLElement;
        case XPATH_STRING:
            return isset($arr_results[0]) ? strval($arr_results) : $default;
        default:
            throw new Exception('$mode Phải dùng CONST. VD: XPATH_ARRAY');
    }
}

/**
 * 
 * @param string $name
 * @param mixed $default
 * @param bool $escape
 * @return mixed
 */
function get_request_var($name, $default = '', $escape = true)
{
    return Request::get_request($name, $default, $escape);
}

/**
 * 
 * @param string $name
 * @param mixed $default
 * @param bool $escape
 * @return mixed
 */
function get_post_var($name, $default = '', $escape = true)
{
    return Request::get_post($name, $default, $escape);
}

/**
 * Dấu phân cách tiếp theo là ? hay &
 * @param string $url
 * @return string
 */
function get_sep($url)
{
    return strpos($url, '?') !== false ? '&' : '?';
}

/**
 * Dịch theo ngôn ngữ lưu ở cookie, default=en_us
 * @param string $str
 * @param array $params
 * @return string
 */
function __($str, $params = array())
{
    return Lang::get_instance(Cookie::get('lang', 'en_us'))->translate($str, $params);
}
