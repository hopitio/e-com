<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class userDetail extends BaseController
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
    
    function history($userId){
        $postData = $this->input->post();
        $startDate = $postData['startDate'];
        $endDate = $postData['endDate'];
        $limit = $postData['limit'];
        $offset = $postData['offset'];
        $portalBizUserHistory = new PortalBizUserHistory(); 
        $histories = $portalBizUserHistory->getUserHistory($userId,$startDate, $endDate, $limit, $offset);
        $counts = $portalBizUserHistory->getUserHistoryCount($userId, $startDate, $endDate);
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = array(
            'histories' => $histories,
            'count' => $counts
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    function setting($userId){
        $portalSetting = new PortalModelUserSetting();
        $portalSetting->fk_user = $userId;
        $results = $portalSetting->getMutilCondition();
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $results;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function contact($userId){
        $portalContact = new PortalModelUserContact();
        $portalContact->fk_user = $userId;
        $results = $portalContact->getMutilCondition();
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $results;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function rejectLoginAccount($userId){
        $portalAccountBiz = new PortalBizAccount();
        $portalAccountBiz->updateToRejectLoginStatus($userId);
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = true;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function openLoginAccount($userId){
        $portalAccountBiz = new PortalBizAccount();
        $portalAccountBiz->updateToOpenLoginStatus($userId);
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = true;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
}
