<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class home extends BaseController
{

    protected $authorization_required = FALSE;

    public function showHome()
    {
        DB::getInstance()->debug = 1;
        $data['materials'] = ListMaterialMapper::make()->findAll();
        
        $data['categories'] = CategoryMapper::make()->filterLanguage("vi")->findAll();
        var_dump($data['categories']);
        
        $this->load->model('Category');
        $cate = $this->Category->loadCategory();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData($data)->render('home');
    }

}
