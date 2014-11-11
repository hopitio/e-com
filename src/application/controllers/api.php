<?php

defined('BASEPATH') or die('no direct script access allowed');

class api extends BaseController
{

    /** @var ProductModel */
    public $productModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/productModel', 'productModel');
    }

    function productSold()
    {
        $productID = (int) $this->input->get('product');
        $quantity = (double) $this->input->get('quantity');

        header('content-type:application/json');
        ob_end_clean();
        echo json_encode($this->productModel->productSold($productID, $quantity));
    }

}
