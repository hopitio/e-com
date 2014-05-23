<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class apiUser extends PortalAdminControllerAbstract
{
    
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
    
    function searchUserInformationXhr(){
        $postData = $this->input->post();
        $userId = $postData['userId'];
        $account = $postData['account'];
        $firstName = $postData['firstName'];
        $lastname = $postData['lastname'];
        $limit = $postData['limit'];
        $offset = $postData['offset'];
        $portalBizAccount =  new PortalBizAccount();
        $count = $portalBizAccount->findUserCount($userId, $account, $firstName, $lastname);
        $results = $portalBizAccount->findUser($userId, $account, $firstName, $lastname, $limit, $offset);
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        foreach ($results as &$result){
            $result->detailUrl = $protocol.$_SERVER['HTTP_HOST']."/portal/__admin/user/{$result->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = array(
            'result' =>$results,
            'count' =>$count
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
}
