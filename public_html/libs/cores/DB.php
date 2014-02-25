<?php

defined('DS') or die;

class DB
{

    /** @var \ADOConnection */
    static protected $_instance;

    static public function get_instance()
    {
        if (static::$_instance == null)
        {
            static::$_instance = NewADOConnection(Config::DB_TYPE);
            static::$_instance->debug = Config::DEBUG_MODE;
            static::$_instance->Connect(
                            Config::DB_HOST
                            , Config::DB_USER
                            , Config::DB_PASSWORD
                            , Config::DB_NAME) or die('Lỗi kết nối CSDL');
            global $ADODB_CACHE_DIR;
            $ADODB_CACHE_DIR = App::get_cache_dir() . 'ADODB_cache/';

            static::$_instance->cacheSecs = 3600 * 24;
            static::$_instance->SetFetchMode(ADODB_FETCH_ASSOC);
        }
        return static::$_instance;
    }

}
