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
        $async = new AsyncResult();
        $async->isError = false;
        $async->data = $orders;
        $this->output->set_content_type('application/json')->set_output(json_encode($async, false));
    }
}