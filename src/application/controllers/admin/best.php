<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class best extends AdminControllerAbstract
{

    protected $authorization_required = TRUE;
    protected $css = array();
    protected $js = array();

    function main()
    {
        $data = array(
            'title' => 'Sản phẩm tốt nhất'
        );

        $this->load->model('modelEx/BestModel', 'bestModel');
        $best_product = $this->bestModel->loadBest();
        $all_category = $this->bestModel->qry_all_category();
        
        $data['script_data'] = array();

        $data['script_data']['product_types'] = $all_category;
        $data['script_data']['product'] = $best_product;

        $this->js[] = '/js/controller/BestController.js';
        LayoutFactory::getLayout(LayoutFactory::TEMP_ADMIN)
                ->setData($data, false)
                ->setCss($this->css)
                ->setJavascript($this->js)
                ->render('admin/best');
    }

    function update()
    {
        $this->load->model('modelEx/BestModel', 'bestModel');
        $this->bestModel->update();
        $this->main();
    }

}
