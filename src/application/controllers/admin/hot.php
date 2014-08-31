<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hot extends AdminControllerAbstract
{

    protected $authorization_required = TRUE;
    protected $css = array();
    protected $js = array();

    function main()
    {
        $data = array(
            'title' => 'Sản phẩm HOT'
        );

        $this->load->model('modelEx/HotModel', 'hotModel');
        $hot_product = $this->hotModel->loadHot();
        $data['script_data'] = array(
            'product_types' => array(
                array('name' => 'HOT', 'type' => 'hot_product')
            )
        );
        $data['script_data']['product'] = $hot_product;
        
        $this->js[] = '/js/controller/HotController.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
                ->setData($data, false)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('admin/hot');
    }

    function update()
    {
        $this->load->model('modelEx/HotModel', 'hotModel');
        $this->hotModel->update();
        $this->main();
    }

}
