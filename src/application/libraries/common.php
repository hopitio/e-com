<?php
class Common {
    static function curPageURL() {
        $pageURL = 'http';
        //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    
    static function getCurrentHost(){
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        return $ns = $protocol.$_SERVER['HTTP_HOST'];
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
            $uuid = chr(123) .             // "{"
            substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen .
                 substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) .
                 $hyphen . substr($charid, 20, 12) . chr(125); // "}"
            return $uuid;
        }
}
}
