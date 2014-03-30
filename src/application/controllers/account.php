<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class account extends BaseController
{

    protected $_CI;

    function __construct()
    {
        parent::__construct();
        $this->_CI = get_instance();
    }

    protected $_cartMapper;

    function showCart()
    {
        
    }

    function addToCart($productID)
    {
        $cartMapper = $this->_getCartMapper();
        $cartMapper->addToCart($productID);
        redirect($this->_controller . '/showCart');
    }

    function _getCartMapper()
    {
        if (!$this->_cartMapper)
        {
            $this->_cartMapper = CartMapper::make();
        }
        return $this->_cartMapper;
    }

}
