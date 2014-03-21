<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends BaseController
{

    protected $authorization_required = FALSE;

    private $_css = array(
        '/style/login.css'
    );

    CONST URL_TO_POST = '/portal/login';

    private $_data = array();

    /**
     * Show login page.
     */
    function showPage()
    {
        $params = $this->getQueryStringParams();
        $url = !empty($params['u']) ? $params['u'] : '/__portal/authen';
        $redirectUrl = !empty($params['t']) ? $params['t'] : '/home';
        $this->_data['postUrl'] = self::URL_TO_POST;
        $this->_data['postUrlCaller'] = $url;
        $this->_data['postUrlTarget'] = $redirectUrl;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
            ->setData($this->_data, true)
            ->setCss($this->_css)
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
        $isValid = $this->loginModel()->validUserNamePassword($us, $pw);
        if (! $isValid)
        {
           $this->canNotLogin();
        }
        
        $isLoginResult = $this->loginModel()->login($us, $pw);
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
     * Load Login model;
     *
     * @return LoginModel $loginModel
     */
    private function loginModel()
    {
        $this->load->model('LoginModel');
        return $this->LoginModel;
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
}