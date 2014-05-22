<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderList extends PortalAdminControllerAbstract
{
    protected $js = array(
        '/js/controller/PortalAdminOrderListController.js',
        '/js/services/PortalAdminOrderListServiceClient.js'
    );
    
    function __construct()
    {
        parent::__construct();
    }

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderList');
    }
    
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
        
    }

}
