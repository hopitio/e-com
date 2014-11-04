<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class apiProduct extends BasePortalController
{

    protected $is_portal_controller = false;

    function getSelledProductTime($productId)
    {
        if (!isset($productId))
        {
            throw new Lynx_RequestException("API: ID paramter is not defined");
        }
        $jobResult = new stdClass();

        $productRepository = new PortalModelProduct();
        $productRepository->sub_id = $productId;
        $result = $productRepository->getCountOfConditions();

        $stdClass = new stdClass();
        $stdClass->sub_product_id = $productId;
        $stdClass->selled_time = $result;
        ob_end_clean();
        $this->output->set_content_type('application/json')->set_output(json_encode($stdClass, true));
    }

}
