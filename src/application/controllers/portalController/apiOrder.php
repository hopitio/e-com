<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiOrder extends BasePortalController
{
    function getSellerOrder($sellerId)
    {
        $page = 0;
        $pageCount = 20;
        
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