<?php

defined('DS') or die;

class Session
{

    const NOTIFICATION = '__NOTIFY__';

    static function init()
    {
        @session_start();
    }

    static function destroy()
    {
        @session_destroy();
        @session_regenerate_id();
    }

    /**
     * @param type $name
     * @param type $default
     * @return type
     */
    static function get($name, $default = null)
    {
        static::init();
        return isset($_SESSION[$name]) ? $_SESSION[$name] : $default;
    }

    /**
     * @param type $name
     * @param type $value
     */
    static function set($name, $value)
    {
        static::init();
        $_SESSION[$name] = $value;
    }

    /**
     * Xóa một biến
     * @param type $name
     */
    static function unset_var($name)
    {
        if (isset($_SESSION[$name]))
        {
            unset($_SESSION[$name]);
        }
    }

    static function get_token()
    {
        return md5(session_id());
    }

    /**
     * @param type $status
     * @param type $text
     */
    static function notify($status, $text)
    {
        static::set(static::NOTIFICATION, array('text' => $text, 'status' => $status));
    }

    static function get_notification()
    {
        $notify = static::get(static::NOTIFICATION, false);
        static::set(static::NOTIFICATION, false);
        return $notify;
    }

    /**
     * @param user_Domain $user
     */
    static function set_current_user(user_Domain $user)
    {
        static::set('__USER__', $user);
    }

    /**
     * @return \user_Domain
     */
    static function get_current_user()
    {
        return static::get('__USER__');
    }

}
