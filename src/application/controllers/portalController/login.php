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
     * Show login page.
     */
    function showPage()
    {
        $params = $this->getQueryStringParams();
        $url = !empty($params['u']) ? $params['u'] : '/__portal/authen';
        $redirectUrl = !empty($params['t']) ? $params['t'] : '/home';
        $this->_data['postUrlCaller'] = $url;
        $this->_data['postUrlTarget'] = $redirectUrl;
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
            !isset($data['postUrlCaller']) || 
            !isset($data['postUrlTarget'])
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
            $this->set_obj_user_to_me($this->obj_user);
            
            $dataResult['postUrl'] = $data['postUrlCaller'];
            $dataResult['dataJson'] = json_encode($user);
            $dataResult['redirect']  = $data['postUrlTarget'];
            
            //redirect('/home');
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($dataResult,false)->render('LoginComplete');
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
        
        $url = !empty($params['u']) ? $params['u'] : '/__portal/authen';
        $redirectUrl = !empty($params['t']) ? $params['t'] : '/home';
        
        $this->_data['error'] = MultilLanguageManager::getInstance()->getLangViaScreen('login', User::getCurrentUser()->languageKey)->lblError;
        $this->_data['postUrlCaller'] = $url;
        $this->_data['postUrlTarget'] = $redirectUrl;
        
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
}