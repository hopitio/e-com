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
        $this->load->model('modelEx/AdvertisementModel','adModel');
        $data['banner'] = $this->adModel->loadBanner();
        $this->js[] = '/js/controller/AdvertisementController.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
                ->setData($data, false)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('admin/advertisement');
    }

    function update()
    {
        $this->load->model('modelEx/AdvertisementModel','adModel');
        $this->adModel->update();
        $this->main();
    }
}
