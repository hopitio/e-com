<?php

defined('DS') or die;

class Config
{

    /**
     * <ul>
     * <li>0 => Tắt debug</li>
     * <li>1 => Hiện lỗi PHP & SQL</li>
     * <li>10 => Hiện debug ở trang Ajax</li>
     * </ul>
     */
    const DEBUG_MODE = 0;
    const SITE_URL = '/e-com/';
    const BRAND = 'eCom';
    const DEFAULT_ROWS_LIMIT = 10;
    const HASH_KEY = 'ta';
    //Cookie
    const COOKIE_EXPIRE_HOURS = 12;
    const COOKIE_PATH = '/e-com/'; //không cần dấu / cuối
    //DB
    const DB_TYPE = 'mysqli';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'ecom';
    //path
    const LIBS_PATH = 'libs/';
    const UPLOADS_PATH = 'uploads/';
    const CACHE_PATH = 'cache/';
    const THEMES_PATH = 'themes/';
    const PUBLIC_PATH = 'public/';
    const APPS_PATH = 'apps/';
    const LANGS_PATH = 'langs/';

}

if (Config::DEBUG_MODE > 0)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
else
{
    ini_set('display_errors', 0);
    error_reporting(0);
}
