<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderDomain implements DomainInterface
{

    public $id;

    /** Mã số độc nhất */
    public $uid;
    public $fkCustomer;
    public $subTotal;
    public $fkOrderStatusHistory;
    public $comment;
    public $bonus;
    public $fkShippingMethod;
    public $fkPaymentMethod;
    public $fkCurrency;
    public $dateCreated;
    public $shippingFee;
    public $discount;
    public $fkShippingAddress;
    public $fkBillingAddress;

    /** @var OrderProductDomain */
    protected $_orderProducts = array();

    function addOrderProduct(OrderProductDomain $instance)
    {
        $this->_orderProducts[] = $instance;
        return $this;
    }

    /**
     * 
     * @return OrderProductDomain
     */
    function getOrderProducts()
    {
        return $this->_orderProducts;
    }

}
