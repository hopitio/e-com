<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class question extends BaseController
{

    protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css'
    );
    protected $_js = array('/js/controller/ChangePasswordController.js');
    protected $_data = [];
    /**
     * show information page
     */
    function showPage(){
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setData($this->_data)
            ->setJavascript($this->_js)
            ->setCss($this->_css)
            ->render('portalaccount/changeQuestion');
    }
    
    
}