<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends BaseController
{

    protected $authorization_required = FALSE;

    public function showHome()
    {
        //$this->load->model('Category');
        //$cate = $this->Category->loadCategory();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array(
                    '/js/controller/HomeCtrl.js'
                ))
                ->render('home');
        //LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData()->render('home');
    }

}
