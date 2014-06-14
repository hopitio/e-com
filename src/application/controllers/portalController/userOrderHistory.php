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
        $portalOrderStatusBiz = new PortalBizPaymentHistory();
        $orders = $portalOrderStatusBiz->getUserOrderWithStatus(User::getCurrentUser(),$filter);
        foreach ($orders as &$order){
            $order->returnUrl = "/portal/order_place/verify?o={$order->id}&i={$order->invoices[0]->id}";
        }
        $async = new AsyncResult();
        $async->isError = false;
        $async->data = $orders;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, false));
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