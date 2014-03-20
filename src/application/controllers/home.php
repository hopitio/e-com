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
        
        $data['products'] = ProductFixedMapper::make()->autoloadAttributes(true, "vi")->findAll();
        var_dump($product = $data['products'][0]->getName()->getTrueValue());
        $this->load->model('Category');
        $cate = $this->Category->loadCategory();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setCss(array("/style/homePage.css"))->setData($data)->render('home');
    }

}
