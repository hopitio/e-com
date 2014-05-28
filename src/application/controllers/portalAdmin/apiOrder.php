<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class apiOrder extends PortalAdminControllerAbstract
{
    
    function findOrderXhr(){
        
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        $postData = $this->input->post();
        $userAccount = $postData['account'];
        $orderId = $postData['orderId'];
        $createDate = $postData['createdDate'];
        $limit = $postData['limit'];
        $offset = $postData['offset'];
        $createdDateStart = date('Y-m-d',strtotime($createDate)); 
        $createdDateEnd = date('Y-m-d',strtotime($createDate));
        $portalOrder = new PortalModelOrder();
        $results = $portalOrder->findOrder($userAccount, $orderId, $createdDateStart, $createdDateEnd,$limit,$offset);
        $count = $portalOrder->findOrderCount($userAccount, $orderId, $createdDateStart, $createdDateEnd);
        foreach ($results as &$result)
        {
            $result->detailUrl = $protocol.$_SERVER['HTTP_HOST']."/portal/__admin/order/{$result->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = array(
            'result' =>$results,
            'count' =>$count[0]->count
        );
        
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getInvoices($orderId){
        $portalModelInvoice = new PortalModelInvoice();
        $portalModelInvoice->fk_order = $orderId;
        $results = $portalModelInvoice->getMutilCondition(T_invoice::created_date,'DESC');
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        foreach ($results as &$result){
            $result->detailUrl = $protocol.$_SERVER['HTTP_HOST']."/portal/__admin/invoice/{$result->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $results;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getOrder($orderId){
        $portalpaymentHistory = new PortalBizPaymentHistory();
        $order = $portalpaymentHistory->getOrderAllInformation($orderId);
        $this->includeDetailURL($order);
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $order;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getOrderStatusHistory($orderId)
    {
        $portalModelHistory = new PortalModelOrderStatus();
        $portalModelHistory->fk_order = $orderId;
        $histories = $portalModelHistory->getMutilCondition(T_order_status::updated_date,'ASC');
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $histories;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    private function includeDetailURL(&$order)
    {
        foreach ($order->invoices as &$invoice){
            $invoice->detail_url = "/portal/__admin/invoice/{$invoice->id}";
        }
        if($order->user != null && isset($order->user)){
            $order->user->detail_url = "/portal/__admin/user/{$order->user->id}";
        }
    }

}
