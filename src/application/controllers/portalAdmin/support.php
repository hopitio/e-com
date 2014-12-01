<?php

/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class support extends PortalAdminControllerAbstract
{

    function __construct()
    {
        parent::__construct();
    }

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
                ->setJavascript(array(
                    get_instance()->config->item('socket.ioURL'),
                    '/js/controller/AdminSupportCtrl.js'
                ))
                ->setCss(array('/style/chat.css'))
                ->render('portalAdmin/support');
    }

}
