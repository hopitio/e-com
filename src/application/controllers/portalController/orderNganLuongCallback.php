<?php
/**
 * Chuyên trách xử lý các hoạt động liên quan đến xử lý Callback từ ngân lượng.
 * @author ANLT 
 * @since 20140405
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class orderNganLuongCallback extends BaseController
{
    protected $authorization_required = false;
    protected $css = array('/style/portalOrder.css');
    protected $js = array('/js/controller/PortalOrderComplete.js');
    function showPage(){
        echo 'completed';
    }
    

}