<?php

/**
 * base for view render.
 * @author ANLT
 * @since 20140312
 */
abstract class AbstractLayout
{

    protected $_CI;

    abstract function render($name, $viewData = array());
    
    protected $_metaData = array();

    protected $_javascript = array();

    protected $_contentView = '';

    protected $_title = '';

    protected $_css = array();

    protected $_layout = '';

    function __construct()
    {
        $this->_CI = &get_instance();
    }
    
    /**
     * Get current user setting.
     * @return User
     */
    protected function getUserSession(){
        $obj_user = $this->_CI->session->userdata(USERS_SESSION);
        if(is_a($objUser, 'User')){
            $this->obj_user = $objUser;
        }else{
            $obj_user = new User();
        }
        return $objUser;
    }
}