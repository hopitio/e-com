<?php
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến user information.
 * @author ANLT 
 * @since 20140404
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userInformation extends password
{
    protected $authorization_required = TRUE;

    function showpage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($viewdata)->render('portalaccount/resetPassword');
    }
    
    function changeUserInformation(){
        $data = $this->input->post();
    
    }
}