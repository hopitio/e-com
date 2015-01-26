<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến cử lý Order history.
 * @author ANLT 
 * @since 20140428
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class userOrderHistory extends BasePortalController
{
    protected $authorization_required = TRUE;
    protected  $_css = array(
        '/style/myaccount.css'
    );
    protected $_js = array('/js/controller/PortalUserOrderHistoryController.js'
                            ,'/js/services/PortalUserOrderHistoryServiceClient.js');
    protected $_data = array();
    
    /**
     * show information page
     */
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
        ->setData($this->_data)
        ->setJavascript($this->_js)
        ->setCss($this->_css)
        ->render('portalaccount/userOrderHistory');
    }
    
    function getOrderHistory($filter){
        $page = $this->input->get("page");
        $page = empty($page) ? 1 : $page;
        $offset = ($page - 1) * 10; // page size default 10;
        $limit = $page * 10;// page size default 10;
        
        $portalOrderStatusBiz = new PortalBizPaymentHistory();
        $orders = $portalOrderStatusBiz->getUserOrderWithStatus(User::getCurrentUser(),$filter,$limit,$offset);
        
        foreach ($orders as &$order){
            $order->returnUrl = "/portal/order_verifing/verify?o={$order->id}&i={$order->invoices[0]->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->data = $orders;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, false));
    }
    
    function getUserNumberOfUserOrder($user_id){
        //var_dump($user_id);die;
        $portalOrderRepository = new PortalModelOrder();
        $result = $portalOrderRepository->getTotalNumberOfUserOrder($user_id);
        $data = array(
            'total' => $result
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($data, false));
    }
    
    function cancelOrder(){
        
        $input = $this->input->post();
        $order = json_decode($input['order']);
        $comment = $input['comment'];
        $portalOrderStatusBiz = new PortalBizPaymentHistory();
        $orderManager = new PortalOrderManager();
        $order = $orderManager->cancelOrder($this->obj_user, $order->id, $comment);
        
        $async = new AsyncResult();
        $async->isError = false;
        $async->data['order'] = $order;
        $async->data['message'] = (string) MultilLanguageManager::getInstance()->getLangViaScreen('portalaccount/userOrderHistory', $this->obj_user->languageKey)->msgCancelOrderComplete;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, false));
    }
}