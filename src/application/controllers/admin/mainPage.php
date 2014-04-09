<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class mainpage extends BaseController
{
    protected $authorization_required = TRUE;
    function showpage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)->render('admin/mainpage');
    }
    
   
}