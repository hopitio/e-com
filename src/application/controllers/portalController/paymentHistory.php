<?php
class paymentHistory extends BasePortalController{
    
    protected  $_css = array(
        '/style/myaccount.css',
        '/style/span.css'
    );
    function showPage($status)
    {
        $portalOrderStatusBiz = new PortalBizPaymentHistory();
        $orderData = $portalOrderStatusBiz->getUserOrderWithStatus(User::getCurrentUser(),$status);
        $dataview = array();
        $dataview['orderData'] = $orderData;
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->setData($dataview)->render('portalOrder/orderHistory');
    }
}