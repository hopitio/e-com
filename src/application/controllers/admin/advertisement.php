<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class advertisement extends AdminControllerAbstract
{

    protected $authorization_required = TRUE;
    protected $css = array();
    protected $js = array();

    function main()
    {
        $data = array();
        $data['script_data'] = array();
        $data['script_data']['banner_types'] = array(
            array('name' => 'Banner trang chủ', 'type' => 'home_banner'),
            array('name' => 'Banner cuối trang', 'type' => 'bottom_banner')
        );
        $banner_type_list = '';
        foreach ($data['script_data']['banner_types'] as $banner_type)
        {
           $banner_type_list .= ",'".$banner_type['type']."'";
        }
        $banner_type_list = substr($banner_type_list, 1).'';
        $this->load->model('modelEx/AdvertisementModel', 'adModel');
        $data['script_data']['old_banner'] = $this->adModel->loadBanner($banner_type_list);

        $this->js[] = '/js/controller/AdvertisementController.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
                ->setData($data, false)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('admin/advertisement');
    }

    function update()
    {
        $this->load->model('modelEx/AdvertisementModel', 'adModel');
        $this->adModel->update();
        $this->main();
    }

}
