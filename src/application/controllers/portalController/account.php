<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class account extends BaseController
{

    protected $authorization_required = FALSE;

    /**
     * Register account
     */
    function registerAccount()
    {
        $accountBiz = new PortalAccountBiz();
        $accountBiz->insertNewUser('An', 'Lê Thanh', 
            'lethanhan.bkaptech@gmail.com', 'ANLT', 'M', '2014-03-25 21:28:00', 
            '0916002005');
    }
    
    /**
     * show information page
     */
    function showAccountInformation(){
        $currentUser = User::getCurrentUser();
        
    }
    
    
}