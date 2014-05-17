<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiUser extends BaseController
{
    function getUserContacts($id){
        $portalBiz = new PortalBizContact();
        $user = new User();
        $user->id = $id;
        $asyncResult = new AsyncResult();
        $asyncResult->isError = false;
        $asyncResult->data = $portalBiz->getUserContacts($user);
        $this->output->set_content_type('application/json')->set_output(json_encode($asyncResult, true));
    }
    
    
}