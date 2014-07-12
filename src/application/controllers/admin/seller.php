<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class seller extends AdminControllerAbstract
{
    protected $authorization_required = TRUE;
    protected $css = array(); 
    protected $js = array();
    function showPage()
    {
        $this->js[] = '/js/controller/SellerController.js';
        $this->js[] = '/js/services/SellerServiceClient.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
        ->setData(array(),false)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('admin/seller');
    }
    
    function save(){
        
    }
}