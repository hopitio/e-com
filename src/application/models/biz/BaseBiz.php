<?php

/**
 * Base cho tất các biz class khác của subsystem
 * @author ANLT
 * @since 20140325
 */
class BaseBiz extends CI_Model
{
    protected $_CI;
    function __construct()
    {
        parent::__construct();
        $this->_CI =& get_instance(); 
    }
}
