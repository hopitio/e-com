<?php

defined('BASEPATH') or die('No direct script access allowed');

class CartMapper extends ProductFixedMapper
{

    const CART_CONTENTS = 'cart_contents';

    function __construct($domain = 'CartDomain')
    {
        parent::__construct($domain);
        $cartContents = $this->_getCartContents();
        if (!empty($cartContents))
        {
            $productList = implode(',', array_keys($cartContents));
            $this->_query->where("p.id IN ($productList)", 'cart');
        }
        else
        {
            //không lấy sp nào do không có phần tử trong cart
            $this->_query->where('1=2', 'cart');
        }
    }

    function addToCart($productID)
    {
        $cartContents = $this->_getCartContents();
        if (!isset($cartContents[$productID]))
        {
            $cartContents[$productID] = 1;
        }
        $this->_setCartContents($cartContents);
        return $this;
    }

    function updateQuantity($productID, $quantity)
    {
        $cartContents = $this->_getCartContents();
        $cartContents[$productID] = $quantity;
        $this->_setCartContents($cartContents);
        return $this;
    }

    function removeFromCart($productID)
    {
        $cartContents = $this->_getCartContents();
        if (isset($cartContents[$productID]))
        {
            unset($cartContents[$productID]);
        }
        return $this;
    }

    /**
     * Lấy cart từ Session
     * @return array
     */
    protected function _getCartContents()
    {
        $ret = get_instance()->session->userdata(static::CART_CONTENTS);
        $ret = $ret ? $ret : array();
        return $ret;
    }

    /**
     * Lưu cart vào Session
     * @param array $data
     */
    protected function _setCartContents($data)
    {
        get_instance()->session->set_userdata(static::CART_CONTENTS, $data);
    }

    /**
     * 
     * @param string $fields
     * @return CartDomain
     */
    function findAll($fields = '*')
    {
        $cartContents = $this->_getCartContents();
        $domains = parent::findAll($fields);
        foreach ($domains as $instance)
        {
            /* @var $instance CartDomain */
            $instance->quantity = isset($cartContents[$instance->id]) ? $cartContents[$instance->id] : 1;
        }
        return $domains;
    }

}
