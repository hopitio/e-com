<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class account extends BaseController
{

    protected $authorization_required = TRUE;

    
    
    /**
     * show information page
     */
    function showAccountInformation(){
        $currentUser = User::getCurrentUser();
        
    }


}