<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiOrder extends BasePortalController
{
    function getOrder($orderId){
        $serviceRepository = new PortalBizPaymentHistory();
        $orders = $serviceRepository->getOrderAllInformation($orderId);
        $this->output->set_content_type('application/json')->set_output(json_encode($orders, true));
    }
    
    
    function getSelledProduction($sellerId){
        $page = $this->input->get('page');
        $pageCount = $this->input->get('page_count');
        $page = is_nan($page) ? 1 : $page;
        $pageCount = is_nan($page) ? 20 : $pageCount;
        
        $productRespository = new PortalModelProduct();
        $productRespository->seller_id = $sellerId;
        $products = $productRespository->getMutilCondition(T_product::created_at,'DESC',$page,($page - 1) * $pageCount);
        
        $this->output->set_content(json_encode($products));
    }
}