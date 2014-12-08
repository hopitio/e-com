<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class userDetail extends PortalAdminControllerAbstract
{

    protected $js = array(
        '/js/controller/PortalUserController.js',
        '/js/services/PortalUserServiceClient.js'
    );
    function __construct()
    {
        parent::__construct();
    }

    function showPage($id)
    {
        $portalBizUser = new PortalBizAccount();
        $user = $portalBizUser->getUserInformation($id);
        unset($user->password);
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array('cuser'=>$user),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/userDetail');
    }
    
    function create(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript(array("/js/controller/PortalUserAddController.js"))
        ->render('portalAdmin/userAdd');
    }
}
