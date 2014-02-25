<?php

defined('DS') or die;

abstract class Domain_Model extends Model
{

    protected static $_mapper = array();

    /** @var \Query */
    static protected $_query;

    /**
     * 
     * @return \Query
     */
    static public function reset_query()
    {
        static::$_query = make_query();
        return static::$_query;
    }

    /**
     * 
     * @return \Query
     */
    static function get_query()
    {
        return static::$_query;
    }

    public function import_array($arr_data, $custom_mapper = null)
    {
        $arr_mapper = $custom_mapper ? $custom_mapper : static::$_mapper;
        foreach ($arr_mapper as $prop_name => $field_name)
        {
            if (isset($arr_data[$field_name]))
            {
                $this->{$prop_name} = $arr_data[$field_name];
            }
        }
    }

}
