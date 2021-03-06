<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('redirect'))
{
    function redirect($uri = '', $method = 'location', $http_response_code = 302)
    {
        if ( ! preg_match('#^https?://#i', $uri))
        {
            $uri = base_url($uri);    // site_url を base_url に変更 smaeda
        }

        switch($method)
        {
            case 'refresh': header("Refresh:0;url=".$uri);
                break;
            default: header("Location: ".$uri, TRUE, $http_response_code);
            break;
        }
        exit;
    }
}
