<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class staticPage extends BaseController
{
    protected $authorization_required = FALSE;
    protected  $_css = array(
        '/style/login.css'
    );
    
    function showPolicy(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalHelp/policy');
    }
}