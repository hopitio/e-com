<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class staticPage extends BaseController
{

    protected $authorization_required = FALSE;

    function __construct()
    {
        parent::__construct();
        $this->layout = LayoutFactory::getLayout(LayoutFactory::TEMP_STATIC_PAGE);
    }

    function showPage($page)
    {
        $language = User::getCurrentUser()->languageKey;
        $this->load->helper('file');
        $string = read_file(APPPATH . "temp/page/{$language}/{$page}.html");
        if (!$string)
        {
            throw new Lynx_RequestException(__FILE__ . ' ' . __METHOD__ . ' ' . "{$page} not found");
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
                ->setData(array('data' => $string))
                ->setJavascript(array())
                ->render('page');
    }

    function quality_assurance()
    {
        $this->layout->render('static/quality_assurance');
    }

    function privacy_policy()
    {
        $this->layout->render('static/privacy_policy');
    }

    function terms_n_conditions()
    {
        $this->layout->render('static/terms_n_conditions');
    }

    function shipping_policy()
    {
        $this->layout->render('static/shipping_policy');
    }

}
