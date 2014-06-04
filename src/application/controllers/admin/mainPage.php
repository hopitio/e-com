<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class mainpage extends AdminControllerAbstract
{
    protected $authorization_required = TRUE;
    protected $css = array(); 
    protected $js = array();
    function showpage()
    {
        $this->css[] = '/style/adminMainPage.css';
        $this->js[] = '/js/controller/AdminMainPageController.js';
        $this->js[] = '/js/services/AdminMainPageServiceClient.js';
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('admin/mainpage');
    }
    
   
}