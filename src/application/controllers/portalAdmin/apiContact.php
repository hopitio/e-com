<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class apiContact extends PortalAdminControllerAbstract
{
    function getContact($contactId){
        $portalmodelContact = new PortalModelUserContact();
        $portalmodelContact->id = $contactId;
        $portalmodelContact->getOneById();
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $portalmodelContact;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }

}
