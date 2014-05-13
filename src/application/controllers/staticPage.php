<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class staticPage extends BaseController
{
    protected $authorization_required = FALSE;
    
    function showPage($page)
    {
        $language = User::getCurrentUser()->languageKey;
        $this->load->helper('file');
        $string = read_file(APPPATH."temp/page/{$language}/{$page}.html");
         if(!$string){
            throw new Lynx_RequestException(__FILE__. ' ' . __METHOD__.' '. "{$page} not found");
         }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
                ->setData(array('data' => $string))
                ->setJavascript(array())
                ->render('page');
    }
}