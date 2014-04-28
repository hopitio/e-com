<?php
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến user information.
 * @author ANLT 
 * @since 20140404
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userInformation extends BaseController
{
        protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css'
    );
    protected $_js = array('/js/controller/UserInformationController.js'
                            ,'/js/services/UserInformationServiceClient.js');
    protected $_data = [];
    
    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setJavascript($this->_js)->setData($this->_data)->setCss($this->_css)->render('portalaccount/userInformation');
    }
    
    function getUserInformationXhr(){
        $viewdata = array();
        $viewdata['fristName'] = $this->obj_user->firstname;
        $viewdata['lastName'] = $this->obj_user->lastname;
        $viewdata['sex'] = $this->obj_user->sex;
        $viewdata['dob'] = $this->obj_user->DOB;
        
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userInformation', $this->obj_user->languageKey);
        
        $m = $language->sexM->__toString();
        $f = $language->sexF->__toString();
        $o = $language->sexO->__toString();
        
        $sexCollection = array(
            array('key'=>'M','display'=>$m),
            array('key'=>'F','display'=>$f),
            array('key'=>'O','display'=>$o),
        );
        $result = array(
            'userInformation' => $viewdata,
            'sexCollection' => $sexCollection,
        );
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->data = $result;
        
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function validForm($fristName,$lastName,$dob,$sex){
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userInformation', $this->obj_user->languageKey);
        if(strlen($fristName) <=0 || strlen($fristName) >= 25){
            return $language->userInformationMsgFirstname->__toString();
        }
        
        if(strlen($lastName) <=0 || strlen($lastName) >= 25){
            return $language->userInformationMsgLastName->__toString();
        }
        
        if(strlen($dob) <= 0){
            return $language->userInformationMsgDob->__toString();
        }
        
        return null;
    }
    
    function updateUserinformationXhr(){
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userInformation', $this->obj_user->languageKey);
        $data = $this->input->post();
        $data = json_decode($data['userInformation']);
        $fristName = $data->fristName;
        $lastName = $data->lastName;
        $dob =  $data->dob;
        $sex = $data->sex;
        if(!isset($fristName) || !isset($lastName) || !isset($dob) || !isset($sex)){
            throw new Lynx_RequestException(__CLASS__.' '.__METHOD__.' Request change user information error');
        }
        $error = $this->validForm($fristName, $lastName, $dob, $sex);
        
        if($error != null){
            $asyn = new AsyncResult(); 
            $asyn->isError = true;
            $asyn->errorMessage = $error;
            $this->output->set_content_type('application/json')->set_output(json_encode($asyn, true));
            return;
        }
        
        $accountBiz = new PortalBizAccount();
        $user = $accountBiz->updateUserInformation($this->obj_user, $fristName, $lastName, $dob, $sex);
        $this->obj_user->id = $user->id;
        $this->obj_user->account = $user->account;
        $this->obj_user->date_joined = $user->date_joined;
        $this->obj_user->DOB = $user->DOB;
        $this->obj_user->firstname = $user->firstname;
        $this->obj_user->lastname = $user->lastname;
        $this->obj_user->last_active = $user->last_active;
        $this->obj_user->lastname = $user->lastname;
        $this->obj_user->platform_key = $user->platform_key;
        $this->obj_user->sex = $user->sex;
        $this->obj_user->status = $user->status;
        $this->set_obj_user_to_me($this->obj_user);
        
        $asyn = new AsyncResult();
        $asyn->isError = false;
        $asyn->data = array(
            'msg'=>$language->userInformationMsgSucess->__toString()
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($asyn, true));
    }
    
}