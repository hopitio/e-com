<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . 'helpers' . DS . 'ViewHelpers.php';

class cart extends BaseController
{

    protected $_CI;
    public $cartModel;

    function __construct()
    {
        parent::__construct();
        $this->_CI = get_instance();
        $this->load->model('modelEx/cartModel');
    }

    protected $_cartMapper;

    function shipping()
    {
        $data['provinces'] = LocationMapper::make()->filterLevel('province')->select('codename, name')->findAssoc();
        $data['shippingMethods'] = ShippingMethodMapper::make()->findAll();
        $data['cartContents'] = CartMapper::make()->autoloadAttributes(true, User::getCurrentUser()->languageKey)->findAll();
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
            $obj['price'] = $product->calculatePrice('USD');
            $obj['name'] = $product->getName()->getTrueValue();
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function shippingPriceService()
    {
        header('Content-type: application/json');
        $locationID = isset($_GET['location']) ? $_GET['location'] : null;
        $shippingMethodCode = isset($_GET['shipping']) ? $_GET['shipping'] : null;
        $price = $this->cartModel->calculateShippingPrice($shippingMethodCode, $locationID, 'USD');
        echo json_encode((double) $price);
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
