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
        $this->_data['postUrl'] = self::URL_TO_POST;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData(
            $this->_data, true)
            ->setCss($this->_css)
            ->render('login');
    }

    /**
     * Process login page.
     */
    function authenicate()
    {
        $data = $this->input->post();
        if (! isset($data['txtUs']) || ! isset($data['txtPw']))
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
            $params = $this->getQueryStringParams();
            $url = !empty($params['u']) ? $params['u'] : '/home';
            $data = array();
            $data['postUrl'] = $url;
            $data['dataJson'] = json_encode($this->obj_user);
            LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data,false)->render('LoginComplete');
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
        $this->_data = array();
        $this->_data['postUrl'] = self::URL_TO_POST;
        $this->_data['error'] = MultilLanguageManager::getInstance()->getLangViaScreen(
            'login', User::getCurrentUser()->languageKey)->lblError;
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
}