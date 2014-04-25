<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class lostPassword extends BaseController
{
    protected $authorization_required = FALSE;
    protected  $_css = array(
        '/style/login.css'
    );
    
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalaccount/lostPassword');
    }
}