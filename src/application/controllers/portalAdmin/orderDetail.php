<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class orderDetail extends PortalAdminControllerAbstract
{
//     function __construct()
//     {
//         parent::__construct();
//     }
    
    protected $js = array(
        '/js/controller/PortalAdminOrderController.js',
        '/js/services/PortalAdminOrderServiceClient.js'
    );
    
    function showPage($orderId)
    {
        $portalmodelOrder = new PortalModelOrder();
        $portalmodelOrder->id = $orderId;
        $portalmodelOrder->getOneById();
        if($portalmodelOrder->created_date  == null || !isset($portalmodelOrder->created_date)){
            throw new Lynx_RoutingException(__FILE__.' '.__LINE__.' '.'Page not found '.$_POST['REQUEST_URI']);
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setJavascript($this->js)
        ->render('portalAdmin/orderDetail');
    }
    
    function nextUpdateStatus($orderId){
        $dataPost = $this->input->post();
        $comment = null;
        if(isset($dataPost['comment'])){
            $comment =  $dataPost['comment'];
        }
        $portalBizOrder = new PortalBizOrder();
        $status = $portalBizOrder->nextUpdateStatus($orderId, $comment);
        log_message('error', var_export($status->status,true).'-'.$status->id);
        $async = new AsyncResult();
        if($status == null){
            $async->isError = true;
            $async->errorMessage = 'Không thể thực hiện việc thay đổi trạng thái của order';
            $async->data = null;
        }else{
            $async->isError = false;
            $async->errorMessage = null;
            $async->data = "Chuyển trạng thái order thành công sang \"{$status->status}\"";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function backOrderStatus($orderId){
        $dataPost = $this->input->post();
        $comment = null;
        if(isset($dataPost['comment'])){
            $comment =  $dataPost['comment'];
        }
        $portalBizOrder = new PortalBizOrder();
        $status = $portalBizOrder->backOrderStatus($orderId, $comment);
        $async = new AsyncResult();
        if($status == null){
            $async->isError = true;
            $async->errorMessage = 'Không thể thực hiện việc thay đổi trạng thái của order';
            $async->data = null;
        }else{
            $async->isError = false;
            $async->errorMessage = null;
            $async->data = "Chuyển trạng thái order thành công sang \"{$status->status}\"";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }
    
    function rejectOrder($orderId){
        $dataPost = $this->input->post();
        $comment = null;
        if(isset($dataPost['comment'])){
            $comment =  $dataPost['comment'];
        }
        $portalBizOrder = new PortalBizOrder();
        $status = $portalBizOrder->rejectOrder($orderId, $comment);
        $async = new AsyncResult();
        if($status == null){
            $async->isError = true;
            $async->errorMessage = 'Không thể thực hiện việc thay đổi trạng thái của order';
            $async->data = null;
        }else{
            $async->isError = false;
            $async->errorMessage = null;
            $async->data = "Chuyển trạng thái order thành công sang \"{$status->status}\"";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($async, true));
    }

}
