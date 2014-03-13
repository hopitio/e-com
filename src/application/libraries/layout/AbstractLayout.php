<?php

/**
 * base for view render.
 * @author ANLT
 * @since 20140312
 */
abstract class AbstractLayout
{
    /** @var \CI_Controller */
    protected $_CI;

    abstract function render($name, $view_data = array());

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

}
