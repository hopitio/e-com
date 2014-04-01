<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends BaseController
{

    protected $authorization_required = FALSE;
    private $_css = array('/style/login.css');
    private $_js = array('/js/login.js');
    CONST URL_TO_POST = '/portal/login';
    CONST URL_TO_POST_RES = '/portal/register';

    private $_data = array();

    
    /**
     * Điều hướng với các action khác nhau 
     */
    function indexPost(){
        $c = $this->input->post('c');
        switch ($c){
        	case 'resg':
        	    $this->registerAccount();
        	    break;
        	case 'login' :
        	    $this->authenicate();
        	    break;
        	default:
        	    throw new Lynx_RequestException(__CLASS__.'::indexPost: Sai paramater');
        	    break;
        }
    }
    
    /**
     * Show login page.
     */
    function showPage()
    {
        if(User::getCurrentUser()->is_authorized){
            $this->remove_obj_user_to_me();
            $this->set_obj_user_to_me(new User());
        }
        $this->_data = array();
        $params  = $this->getQueryStringParams();
        $subSysKey = isset($params['su']) ? $params['su'] : null;
        $currentPage = isset($params['cp']) ? $params['cp'] : '/portal/account';
        $sessionId = isset($params['se']) ? $params['se'] : null;
        $endPoint = isset($params['ep']) ? $params['se'] : null;

        $this->_data['su'] = $subSysKey;
        $this->_data['cp'] = $currentPage;
        $this->_data['se'] = $sessionId;
        $this->_data['ep'] = $endPoint;
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setData($this->_data, true)
            ->setCss($this->_css)
            ->setJavascript($this->_js)
            ->render('login');
    }

    /**
     * Process login page.
     */
    function authenicate()
    {
        $data = $this->input->post();
        if (
            !isset($data['txtUs']) || 
            !isset($data['txtPw'])|| 
            !isset($data['currentPage']) || 
            !isset($data['endpoint']) ||
            !isset($data['session']) ||
            !isset($data['subSys'])
        )
        {
            throw new Lynx_RequestException('request login thiếu tham số');
        }
        
        $us = $data['txtUs'];
        $pw = $data['txtPw'];
        $isValid = $this->isValidLoginData($us, $pw);
        if (! $isValid)
        {
           $this->canNotLogin();
        }
        $portalAccountBiz = new PortalAccountBiz();
        $isLoginResult = $portalAccountBiz->getLogin($us,$pw);
        if ($isLoginResult)
        {
            $dataResult = array();
            $user = new User();
            $this->obj_user->portalData = json_encode($user);
            $this->obj_user->is_authorized = true;
            $this->onLoginComplete();
            return;
        }
        else
        {
            $this->canNotLogin();
        }
    }

    /**
     * User can not login.
     */
    private function canNotLogin()
    {
        //$this->showPage();
        $params = $this->getQueryStringParams();
        $this->_data = array();
        
        $subSysKey = isset($params['su']) ? $params['su'] : null;
        $currentPage = isset($params['cp']) ? $params['cp'] : '/portal/account';
        $sessionId = isset($params['se']) ? $params['se'] : null;
        $endPoint = isset($params['ep']) ? $params['se'] : null;
        
        $this->_data['error'] = MultilLanguageManager::getInstance()->getLangViaScreen('login', User::getCurrentUser()->languageKey)->lblError;
        $this->_data['su'] = $subSysKey;
        $this->_data['cp'] = $currentPage;
        $this->_data['se'] = $sessionId;
        $this->_data['ep'] = $endPoint;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
            $this->_data, true)
            ->setCss($this->_css)
            ->render('login');
    }

    
    /**
     * logout system.
     */
    public function out(){
        $params = $this->getQueryStringParams();
        $url = !empty($params['u']) ? $params['u'] : '/home';
        $this->obj_user = new User();
        $this->set_obj_user_to_me($this->obj_user);
        redirect($url);
        return;
    }
    
    /**
     * Hỗ trợ việc valid dữ liệu
     * @param string $username
     * @param string $password
     * @return bool
     */
    private function isValidLoginData($username,$password){
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $username) !== 1)
        {
            return false;
        }
        
        $case = preg_match('@[a-z0-9A-Z]@', $password);
        if(!$case || strlen($password) < 8) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Register account
     */
    function registerAccount()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordRetry = $this->input->post('passwordRetry');
        $fristName = $this->input->post('fristName');
        $lastName = $this->input->post('lastName');
        $dob = '0000-00-00 00:00:00';
        $sex = $this->input->post('sex');
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
    
        if( !isset($email) ||
            !isset($password) ||
            !isset($passwordRetry) ||
            !isset($fristName) ||
            !isset($lastName) ||
            !isset($sex) ||
            !isset($question) ||
            !isset($answer)
        ){
            throw new Lynx_RequestException(__CLASS__.'::registerAccount:request login thiếu tham số');
        }
        $error = $this-> validAccount();
        if(count($error) > 0)
        {
            $erroData = array(
                'errorRegister' => $error,
            );
            $css = array('');
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setData($erroData, true)
            ->setCss($this->_css)
            ->render('login');
            return;
        }
    
        $accBiz = new PortalAccountBiz();
        $id = $accBiz->insertNewUserNormal($fristName, $lastName, $email, $password, $sex, $dob, $question, $answer);
        if($id){
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->render('registercomplete');
        }else{
            throw new Lynx_Exception(__CLASS__.'Đăng ký tài khoản không thành công');
        }
    }
    
    /**
     * Valid Request Account
     */
    function validAccount(){
        $email = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordRetry = $this->input->post('passwordRetry');
        $fristName = $this->input->post('fristName');
        $lastName = $this->input->post('lastName');
        $dob = '0000-00-00 00:00:00';
        $sex = $this->input->post('sex');
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
        $woringData = array();
        $language = MultilLanguageManager::getInstance()->getLangViaScreen('login', User::getCurrentUser()->languageKey);
    
    
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $email) !== 1 || strlen($email) >= 254)
        {
            array_push($woringData, $language->msgWoringEmail);
        }
    
        $case = preg_match('@[a-z0-9A-Z]@', $password);
        if(!$case || strlen($password) < 8 || strlen($password) > 50 || $password != $passwordRetry || strlen($password) <= 0) {
            array_push($woringData, $language->msgWoringPass);
        }
    
        if(strlen($lastName) <= 0 || strlen($lastName) >= 49){
            array_push($woringData, $language->msgWoringLastName);
        }
    
        if(strlen($fristName) <= 0 || strlen($fristName) >= 49){
            array_push($woringData, $language->msgWoringFristName);
        }
    
        if(strlen($answer) >= 49){
            array_push($woringData, $language->msgWoringAns);
        }
    
        return  $woringData;
    }
    
    /**
     * Login hệ thống thành công.
     */
    function onLoginComplete(){
        $data = $this->input->post();
        if (
            !isset($data['currentPage']) || 
            !isset($data['endpoint']) ||
            !isset($data['session']) ||
            !isset($data['subSys'])
        ){
            throw new Lynx_RequestException(__CLASS__.'::onLoginComplete:request login thiếu tham số');
        }
        $this->set_obj_user_to_me($this->obj_user);
        $user = clone $this->obj_user;
        unset($user->id);
        if($data['endpoint'] == null || $data['endpoint'] = ''){
            redirect('/portal/account');
            exit;
        }
        $dataResult['postUrl'] = $data['endpoint'];
        $dataResult['redirect']  = $data['currentPage'];
        $dataResult['secretKey'] =  SecurityManager::inital()->getEncrytion()->encrytSecretLogin($this->obj_user->id, $data['session']);
        $dataResult['dataJson'] = json_encode($user);

        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($dataResult,false)->render('LoginComplete');
    }
}