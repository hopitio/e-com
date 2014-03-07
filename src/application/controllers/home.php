<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller
{
    protected $authorization_required = true;
    public function showHome(){
        $this->load->view('home');
    }
}