<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller
{
    protected $authorization_required = FALSE;
    
    public function showHome(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setData()->setCss(array("___",'1111'))->render('home');
    }
}