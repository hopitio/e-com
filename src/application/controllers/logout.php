<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class logout extends BaseController
{
    protected $authorization_required = FALSE;
    function out(){
       $queryString =  $this->getQueryStringParams();
       $this->obj_user = new User();
       $this->set_obj_user_to_me($this->obj_user);
       if(isset($queryString['u'])){
            redirect($queryString['u']);
       }else{
           
            redirect('/portal/login');
       }
    }
}