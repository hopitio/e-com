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
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setCss(array('/style/customerList.css'))
                ->render('pin/showPage');
    }

    function getAllPinService()
    {
        header('Content-type: application/json');
        $limit = 10;
        $offset = (int) $this->input->get('offset');
        $pinList = $this->pinModel->getAllPin($limit, $offset);
        $json = array();
        foreach ($pinList as $instance)
        {
            $images = $instance->getImages('thumbnail');
            $obj = get_object_vars($instance);
            $obj['name'] = (string) $instance->getName();
            $obj['description'] = (string) $instance->getDescription();
            $obj['price'] = (string) $instance->getFinalPriceMoney(User::getCurrentUser()->getCurrency());
            $obj['stock'] = (string) $instance->getQuantity();
            $obj['thumbnail'] = $images[0]->url;
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
