<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller
{
    protected $authorization_required = FALSE;
    
    public function showHome(){
        $this->load->initalView('home',LayoutFactory::TEMP_ONE_COl);
    }
}