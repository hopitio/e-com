<?php
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến user information.
 * @author ANLT 
 * @since 20140404
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userInformation extends BasePortalController
{
    protected $authorization_required = TRUE;
    protected  $_css = array(
         '/style/myaccount.css'
        ,'/plugins/datepicker/css/datepicker.css'
    );
    protected $_js = array('/js/controller/PortalUserInformationController.js'
                            ,'/js/services/PortalUserInformationServiceClient.js'
                            ,'/js/ui-bootstrap-tpls-0.10.0.min.js'
                            ,'/js/ng-grid.min.js'
                            ,'/plugins/datepicker/js/bootstrap-datepicker.js'
                            ,'/js/date_function.js');
    protected $_data = array();
    
    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setJavascript($this->_js)->setData($this->_data)->setCss($this->_css)->render('portalaccount/userInformation');
    }
    
    function getUserInformationXhr(){
        $viewdata = array();
        $viewdata['full_name'] = $this->obj_user->full_name;
        $viewdata['phone'] = $this->obj_user->phone;
        $viewdata['sex'] = $this->obj_user->sex;
        $viewdata['dob'] = DateTime::createFromFormat(DatabaseFixedValue::DEFAULT_FORMAT_DATE, $this->obj_user->DOB)->format('d/m/Y');
        
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
    
    function validForm($fullname,$phone,$dob,$sex){
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userInformation', $this->obj_user->languageKey);
        if(strlen($fullname) <=0 || strlen($fullname) >= 25){
            return $language->userInformationMsgFirstname->__toString();
        }
        
        if(strlen($phone) <=0 || strlen($phone) >= 25){
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
        $fullName = $data->full_name;
        $phone = $data->phone;
        $dobDatetimeObject = DateTime::createFromFormat('d/m/Y', $data->dob);
        $dob = $dobDatetimeObject === false ?  "" : $dobDatetimeObject->format(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $sex = $data->sex;
        if(!isset($fullName) || !isset($phone) || !isset($dob) || !isset($sex)){
            throw new Lynx_RequestException(__CLASS__.' '.__METHOD__.' Request change user information error');
        }
        $error = $this->validForm($fullName, $phone, $dob, $sex);
        if($error != null){
            $asyn = new AsyncResult(); 
            $asyn->isError = true;
            $asyn->errorMessage = $error;
            $this->output->set_content_type('application/json')->set_output(json_encode($asyn, true));
            return;
        }
        
        $accountBiz = new PortalBizAccount();
        $user = $accountBiz->updateUserInformation($this->obj_user, $fullName, $phone, $dob, $sex);
        $this->obj_user->id = $user->id;
        $this->obj_user->account = $user->account;
        $this->obj_user->date_joined = $user->date_joined;
        $this->obj_user->DOB = $user->DOB;
        $this->obj_user->phone = $user->phone;
        $this->obj_user->full_name = $user->full_name;
        $this->obj_user->last_active = $user->last_active;
        $this->obj_user->phone = $user->phone;
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
    
    function getUserContactXhr(){
        $portalBizContact = new PortalBizContact();
        $return = $portalBizContact->getUserContacts(User::getCurrentUser());
        $async = new AsyncResult();
        $async->isError = false;
        $async->data = $return;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function saveUserinformationXhr(){
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userInformation', $this->obj_user->languageKey);
        $portalBizContact = new PortalBizContact();
        $data = json_decode($this->input->post('result'));
        $return = $portalBizContact->saveContact(User::getCurrentUser(), 
            $data->id, $data->full_name, $data->telephone, $data->state_province, 
            $data->city_district, $data->street_address);
        
        $async = new AsyncResult();
        if($return){
            $async->isError = false;
            $async->data = array('msg'=>$language->msgUpdateContactSucess->__toString());
        }else{
            $async->isError = true;
            $async->errorMessage = $language->msgUpdateContactError->__toString();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
}