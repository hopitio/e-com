<?php

defined('BASEPATH') or die('no direct script allowed');

class pin extends BaseController
{

    /** @var PinModel */
    public $pinModel;

    /** @var WishlistModel */
    public $wishlistModel;

    /** @var CartModel */
    public $cartModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/PinModel', 'pinModel');
        $this->load->model('modelEx/WishlistModel', 'wishlistModel');
        $this->load->model('modelEx/CartModel', 'cartModel');
    }

    function showPage()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->setJavascript(array('/js/angular.min.js'))->render('pin/showPage');
    }

    function getAllPinService()
    {
        header('Content-type: application/json');
        $pinList = $this->pinModel->getAllPin();
        $json = array();
        foreach ($pinList as $instance)
        {
            $obj = get_object_vars($instance);
            $obj['name'] = $instance->getName()->getTrueValue();
            $obj['description'] = $instance->getDescription()->getTrueValue();
            $obj['price'] = $instance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount();
            $obj['quantity'] = $instance->getQuantity()->getTrueValue();
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function pinProduct($productID)
    {
        
        $this->pinModel->pin(User::getCurrentUser()->id, $productID);
    }

    function unpin($productID)
    {
        $this->pinModel->unpin($productID);
    }

    function addToCart($productID)
    {
        DB::getInstance()->StartTrans();
        CartMapper::make()->addToCart($productID);
        $this->pinModel->unpin($productID);
        DB::getInstance()->CompleteTrans();
    }

    function moveToWishlist($productID)
    {
        DB::getInstance()->StartTrans();
        $this->wishlistModel->addToWishlist($productID);
        $this->pinModel->unpin($productID);
        DB::getInstance()->CompleteTrans();
    }

}
