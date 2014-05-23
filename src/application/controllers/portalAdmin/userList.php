<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class userList extends PortalAdminControllerAbstract
{

    protected $js = array(
        '/js/controller/PortalUserListController.js',
        '/js/services/PortalUserListServiceClient.js'
    );
    function __construct()
    {
        parent::__construct();
    }

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/userList');
    }
}
