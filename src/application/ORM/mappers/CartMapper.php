<?php

defined('BASEPATH') or die('No direct script access allowed');

class CartMapper extends ProductFixedMapper
{

    const CART_CONTENTS = 'cart_contents';

    function __construct($domain = 'CartDomain')
    {
        parent::__construct($domain);
        $cartContents = $this->_getCartContents();
        foreach ($cartContents as $k => $v)
        {
            if (!$k || !$v)
            {
                unset($cartContents[$k]);
            }
        }
        $cartContents[0] = 1;
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
        $this->_query->select('p.*, seller.name AS seller_name, seller.email as seller_email, seller.sid, seller.id AS seller_id', true)
                ->innerJoin('t_seller seller', 'p.fk_seller = seller.id');
    }

    function addToCart($productID, $qty = 1)
    {
        $cartContents = $this->_getCartContents();
        if (!isset($cartContents[$productID]))
        {
            $cartContents[$productID] = $qty;
        }
        else
        {
            $cartContents[$productID] += $qty;
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
            $this->_setCartContents($cartContents);
        }
        else
        {
            throw new Exception("This Product is nolonger exists in your cart");
        }
    }

    /**
     * Lấy cart từ Session
     * @return array
     */
    protected function _getCartContents()
    {
        $ret = get_instance()->session->userdata(static::CART_CONTENTS);
        $ret = !empty($ret) ? $ret : array(0);
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

    function emptyCart()
    {
        get_instance()->session->set_userdata(static::CART_CONTENTS, array());
    }

    /**
     * @return CartDomain
     */
    function findAll($callback = null)
    {
        $cartContents = $this->_getCartContents();
        $domains = parent::findAll(function($rawData, $instance)
                {
                    $instance->sellerName = $rawData['seller_name'];
                    $instance->sellerEmail = $rawData['seller_email'];
                    $instance->sid = $rawData['sid'];
                });
        foreach ($domains as $instance)
        {
            /* @var $instance CartDomain */
            $instance->quantity = isset($cartContents[$instance->id]) ? $cartContents[$instance->id] : 1;
        }
        return $domains;
    }

}
