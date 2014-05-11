<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class sellerFind extends BaseController
{
    protected $authorization_required = TRUE;
    protected $css = array(); 
    protected $js = array();
    function showPage()
    {
        $this->css[] = '/style/adminMainPage.css';
        $this->css[] = '/style/adminFind.css';
        $this->js[] = '/js/controller/SellerFindController.js';
        $this->js[] = '/js/services/SellerFindServiceClient.js';
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
        ->setCss($this->css)
        ->setJavascript($this->js)
        ->render('admin/sellerFind');
    }
    
    function getSellerListXhr($pageSize,$pageNumber)
    {
        
    }
    
   
}