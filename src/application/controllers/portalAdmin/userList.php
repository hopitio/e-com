<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class userList extends BaseController
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
