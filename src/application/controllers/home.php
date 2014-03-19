<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class home extends BaseController
{

    protected $authorization_required = FALSE;

    public function showHome()
    {
        $data['materials'] = ListMaterialMapper::make()->findAll();
        $this->load->model('Category');
        $cate = $this->Category->loadCategory();
        log_message('error',var_export($cate,true));
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData($data)->render('home');
    }

}
