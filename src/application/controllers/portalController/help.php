<?php

/**
 * Frontend cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class help extends BaseController
{

    function contact_us()
    {
        //login / guest required
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->render('portalHelp/contact_us');
    }

    function contact_by_email()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->render('portalHelp/contact_by_email');
    }

    function send_email()
    {
        $post = $this->input->post();
    }

    function contact_by_chat()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_CONTENT_ONLY)->render('portalHelp/contact_by_chat');
    }

    function start_chat()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_CONTENT_ONLY)
                ->setJavascript(array(
                    '/js/angular.min.js',
                    'http://localhost:9090/socket.io/socket.io.js'
                ))
                ->setData(array('formData' => $this->input->post()))
                ->render('portalHelp/start_chat');
    }

}
