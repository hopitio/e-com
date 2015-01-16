<?php

class Common
{

    const SESSION_NOTIFY_KEY = '__NOTIFY__';

    static function curPageURL()
    {
        $pageURL = 'http';
        //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    static function getCurrentHost()
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, strpos($_SERVER["SERVER_PROTOCOL"], '/'))) . '://';
        return $ns = $protocol . $_SERVER['HTTP_HOST'];
    }

    static function getGUID()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }
        else
        {
            mt_srand((double) microtime() * 10000); // optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = chr(123) . // "{"
                    substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen .
                    substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) .
                    $hyphen . substr($charid, 20, 12) . chr(125); // "}"
            return $uuid;
        }
    }

    static function redirect_notify($url, $msg = '', $success = true)
    {
        static::notify($msg, $success);
        redirect($url);
    }

    static function redirect_back($msg = '', $success = true)
    {
        if ($msg)
        {
            static::notify($msg, $success);
        }
        die("<html><head><meta charset=\"utf-8\"></head><body><script>window.history.go(-1);</script></body></html>");
    }

    static function notify($msg, $success = true)
    {
        get_instance()->session->set_userdata(array(static::SESSION_NOTIFY_KEY => array(
                'title'   => $success ? 'Cập nhật thành công' : 'Cập nhật thất bại',
                'msg'     => $msg,
                'success' => $success
        )));
    }

    static function get_notification()
    {
        $data = get_instance()->session->userdata(static::SESSION_NOTIFY_KEY);
        get_instance()->session->set_userdata(array(static::SESSION_NOTIFY_KEY => null));
        return $data;
    }

    static function nocache()
    {
        header('Pragma: no-cache');
        header('Cache-Control: max-age=1; no-cache');
        @session_start();
    }

    static function fetch_array($arr, $key, $default = null)
    {
        return (isset($arr[$key]) ? $arr[$key] : $default);
    }

    static function current_url_language($new_language)
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], "\/\\"));
        $arr_lang = array(
            'EN-US' => 'en',
            'VN-VI' => 'vi',
            'KO-KR' => 'kr'
        );
        if (!$uri[0])
        {
            $uri[0] = $arr_lang[$new_language];
        }
        else if (in_array($uri[0], array('en', 'vi', 'kr')))
        {
            $uri[0] = $arr_lang[$new_language];
        }
        else
        {
            array_unshift($uri, $arr_lang[$new_language]);
        }

        return '/' . implode('/', $uri);
    }

    static function language_url($uri)
    {
        $arr_lang = array(
            'EN-US' => 'en',
            'VN-VI' => 'vi',
            'KO-KR' => 'kr'
        );
        return '/' . $arr_lang[User::getCurrentUser()->languageKey] . '/' . trim($uri, "\\\/");
    }

    static function isCrawlers()
    {
        $sites = 'Google|Yahoo|msnbot'; // Add the rest of the search-engines 
        return (preg_match("/$sites/", $_SERVER['HTTP_USER_AGENT']) > 0) ? true : false;
    }

}
