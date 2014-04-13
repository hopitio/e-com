<?php

/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class support extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
                ->setJavascript(array(
                    '/js/angular.min.js',
                    'http://localhost:9090/socket.io/socket.io.js'
                ))
                ->render('portalAdmin/support');
    }
    
}
