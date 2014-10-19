<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class apiSeller extends BasePortalController
{
    protected $is_portal_controller = false;

    function searchSellerProduct($sellerId){
        
        $limit = $this->input->post("length");
        $offset = $this->input->post("start");
        $limit = isset($limit) ? $limit : 20;
        $offset = isset($offset) ? $offset : 0;
        
        $startedAt = $this->input->post("started_at");
        $endedAt = $this->input->post("ended_at");
        $subProductsId = $this->input->post("products_id");
        $status = $this->input->post("order_status");
        
        $startedAt = $startedAt == null || !isset($startedAt) || $startedAt == "" ? null : $startedAt;
        $endedAt = $endedAt == null || !isset($endedAt) || $endedAt == "" ? null : $endedAt;
        
        $stdClass = new stdClass();
        $orderRepository = new PortalModelOrder();
        $orders = $orderRepository->getSearchSellerOrder($sellerId, $subProductsId, $status,$startedAt,$endedAt, $limit, $offset);
        foreach ($orders as &$order){
            $servicePaymentHistory = new PortalBizPaymentHistory();
            $order->information =  $servicePaymentHistory->getOrderAllInformation($order->id);
        }
        $counts = $orderRepository->getSearchSellerOrderCountAllResult($sellerId, $subProductsId, $status,$startedAt,$endedAt);
        $stdClass->start = $offset;
        $stdClass->length = $limit;
        $stdClass->recordsTotal = $counts[0]->count;
        $stdClass->recordsFiltered = $counts[0]->count;
        $stdClass->data = $orders;
        
        $this->output->set_content_type('application/json')->set_output(json_encode($stdClass, true));
    }
}