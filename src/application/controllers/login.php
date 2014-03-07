<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class login extends MY_Controller
{
    protected $authorization_required = FALSE;
    
    /**
     * Show login page.
     */
    function showPage(){
        $this->load->view('login');
    }

}