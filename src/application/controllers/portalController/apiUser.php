<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiUser extends BasePortalController
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
    
    function findUser(){
        $queryStrings = $this->getQueryStringParams();
        $account = isset($queryStrings['account']) ? $queryStrings['account'] : '';
        $id = isset($queryStrings['id']) ? $queryStrings['id'] : '';
        $lastname =  isset($queryStrings['lastname']) ? $queryStrings['lastname'] : '';
        $fristname = isset($queryStrings['fristname']) ? $queryStrings['fristname'] : '';
        $limit = isset($queryStrings['limit']) ? $queryStrings['lastname'] : 10;
        $offset = isset($queryStrings['offset']) ? $queryStrings['offset'] : 0;
        $limit = (!isset($limit) || $limit == null || $limit == '') ? 10 : $limit;
        $offset = (!isset($offset) || $offset == null || $offset == '') ? 0 : $offset;
        $modelUser = new PortalModelUser();
        $users = $modelUser->findUsers($id, $account, $fristname, $lastname, $limit, $offset);
        foreach ($users as &$user){
            unset($user->password);
            unset($user->date_joined);
            unset($user->DOB);
            unset($user->firstname);
            unset($user->lastname);
            unset($user->last_active);
            unset($user->sex);
            unset($user->status);
            unset($user->status_date);
            unset($user->status_reason);
            unset($user->user_type);
        }
        $asyncResult = new AsyncResult();
        $asyncResult->isError = false;
        $asyncResult->data = $users;
        $this->output->set_content_type('application/json')->set_output(json_encode($asyncResult, true));
    }
    
    
}