<?php
/**
 * Admin cho help
 */
defined('BASEPATH') or die('no direct script access allowed');

class dashboard extends PortalAdminControllerAbstract
{

    function __construct()
    {
        parent::__construct();
    }
    protected $_css = array();
    protected $_js = array();
    function showPage()
    {
        redirect('portal/__admin/order_find');
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ADMIN_ONE_COLUMN)
        ->setData(array(),false)
        ->setCss($this->_css)
        ->render('portalAdmin/dashbroad');
    }
}
