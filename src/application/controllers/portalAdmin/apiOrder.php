<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class apiOrder extends PortalAdminControllerAbstract
{
    
    function findOrderXhr(){
        
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
            $result->detailUrl = "portal/__admin/order/{$result->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = array(
            'result' =>$results,
            'count' =>$count
        );
        
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getInvoices($orderId){
        $portalModelInvoice = new PortalModelInvoice();
        $portalModelInvoice->fk_order = $orderId;
        $results = $portalModelInvoice->getMutilCondition(T_invoice::created_date,'DESC');
        foreach ($results as &$result){
            $result->detailUrl = "/portal/__admin/invoice/{$result->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $results;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function getOrder($orderId){
        $portalOrder = new PortalModelInvoice();
        $portalOrder->id = $orderId;
        $portalOrder->getOneById();
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->errorMessage = null;
        $async->data = $portalOrder;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }

}
