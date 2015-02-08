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
    
    function reset_password($id){
        $portalBizUser = new PortalBizAccount();
        $user = $portalBizUser->getUserInformation($id);
        $bizService = "";
        
        $newPass = SecurityManager::inital()->getEncrytion()->getNewpassWordforUser();
        $portalUser = new PortalModelUser();
        $portalUser->id = $user->id;
        $portalUser->getUserByUserId();
        $portalUser->password = $newPass;
        $portalUser->updateUser();
            
        $change_password_page = Common::getCurrentHost()."/portal/account/security?token={$newPass}";
        $change_password_page = urlencode($change_password_page);
        $loginPath = Common::getCurrentHost()."/portal/login/by-token?token={$newPass}&u={$portalUser->id}&cp={$change_password_page}";
        $mailData = array(
            'user'=> $portalUser,
            'password'=>$newPass,
            'url' => $loginPath
        );
        
        MailManager::initalAndSend(MailManager::TYPE_NEWPASSWORD_NOFICATION,  $portalUser->account , $mailData);
        
        redirect("/portal/__admin/user/{$id}");
    } 
}
