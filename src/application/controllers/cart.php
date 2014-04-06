<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . 'helpers' . DS . 'ViewHelpers.php';

class cart extends BaseController
{

    protected $_CI;

    function __construct()
    {
        parent::__construct();
        $this->_CI = get_instance();
    }

    protected $_cartMapper;

    function shipping()
    {
        $data['provinces'] = LocationMapper::make()->filterLevel('province')->findAssoc('id, unitname');
        $data['shippingMethods'] = ShippingMethodMapper::make()->findAll();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data)
                ->setJavascript(array('/js/angular.min.js'))
                ->render('cart/shipping');
    }

    function showCart()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array('/js/angular.min.js'))
                ->render('cart/showCart');
    }

    function cartProductsService()
    {
        header('Content-Type: application/json');
        $products = CartMapper::make()->autoloadAttributes(true, 'VN-VI')->findAll();
        $json = array();
        foreach ($products as $product)
        {
            $obj = (array) $product;
            $obj['quantity'] = $product->quantity;
            $obj['price'] = $product->getPrice('USD')->getTrueValue();
            $obj['name'] = $product->getName()->getTrueValue();
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function updateQuantityService()
    {
        $products = $_POST['products'];
        foreach ($products as $productID => $quantity)
        {
            CartMapper::make()->updateQuantity($productID, $quantity);
        }
    }

    function addToCart($productID)
    {
        CartMapper::make()->addToCart($productID);
        redirect($this->_controller . '/showCart');
    }

    function removeFromCart($productID)
    {
        CartMapper::make()->removeFromCart($productID);
    }

}
