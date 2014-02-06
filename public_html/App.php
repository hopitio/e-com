<?php

defined('DS') or die;

class App
{

    /**
     * Url
     * @return type
     */
    static function get_site_url()
    {
        return Config::SITE_URL;
    }

    /**
     * Duong dan thu muc
     * @return string
     */
    static function get_root_dir()
    {
        return ROOT_DIR;
    }

    /**
     * Duong dan thu muc cache
     */
    static function get_cache_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::CACHE_PATH);
    }

    /**
     * Url den cache
     * @return type
     */
    static function get_cache_url()
    {
        return static::get_site_url() . Config::CACHE_PATH;
    }

    static function get_public_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::PUBLIC_PATH);
    }

    static function get_public_url()
    {
        return static::get_site_url() . Config::PUBLIC_PATH;
    }

    static function get_libs_url()
    {
        return static::get_site_url() . Config::LIBS_PATH;
    }

    static function get_libs_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::LIBS_PATH);
    }

    static function get_apps_url()
    {
        return static::get_site_url() . Config::APPS_PATH;
    }

    static function get_apps_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::APPS_PATH);
    }

    static function get_langs_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::LANGS_PATH);
    }

    static function get_uploads_url()
    {
        return static::get_site_url() . Config::UPLOADS_PATH;
    }

    static function get_uploads_dir()
    {
        return ROOT_DIR . static::_replace_seperator(Config::UPLOADS_PATH);
    }

    static function get_module_url($module)
    {
        if (file_exists(static::get_root_dir() . DS . '.htaccess'))
        {
            return static::get_site_url() . $module . '/';
        }
        else
        {
            return App::get_site_url() . "index.php?url=$module";
        }
    }

    static function get_module_dir($module)
    {
        return static::get_apps_dir() . static::_replace_seperator($module) . DS;
    }

    static function get_controller_url($module, $controller)
    {
        return static::get_module_url($module) . $controller . '/';
    }

    static function get_controller_dir($module, $controller)
    {
        return static::get_module_dir($module, $controller);
    }

    static function get_themes_dir($theme = null)
    {
        $dir = ROOT_DIR . static::_replace_seperator(Config::THEMES_PATH);
        if ($theme == null)
        {
            return $dir;
        }
        else
        {
            return $dir . $theme . DS;
        }
    }

    static function get_themes_url($theme = null)
    {
        $url = static::get_site_url() . Config::THEMES_PATH;
        if ($theme == null)
        {
            return $url;
        }
        else
        {
            return $url . $theme . '/';
        }
    }

    /**
     * Doi seperator tu / sang DS
     * dam bao chay tren moi OS
     * @param string $str
     * @return string
     */
    protected static function _replace_seperator($str)
    {
        return str_replace('/', DS, $str);
    }

}
