<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class account extends BaseController
{

    protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css',
        '/style/span.css'
    );
    
    /**
     * show information page
     */
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalaccount/account');
    }
    
    
}