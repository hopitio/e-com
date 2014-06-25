<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . 'helpers' . DS . 'ViewHelpers.php';

class cart extends BaseController
{

    protected $_CI;
    public $cartModel;

    /** @var WishlistModel */
    public $wishlistModel;

    function __construct()
    {
        parent::__construct();
        $this->_CI = get_instance();
        $this->load->model('modelEx/CartModel', 'cartModel');
        $this->load->model('modelEx/WishlistModel', 'wishlistModel');
    }

    protected $_cartMapper;

    function shipping()
    {
        $data['provinces'] = LocationMapper::make()->filterLevel('province')->select('codename, name', true)->findAssoc();
        $data['shippingMethods'] = ShippingMethodMapper::make()->findAll();
        $data['cartContents'] = CartMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->findAll();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data)
                ->setCss(array('/style/customerList.css'))
                ->setJavascript(array(
                    '/plugins/validation/jquery.validate.min.js',
                    '/plugins/validation/additional-methods.min.js'
                ))->render('cart/shipping');
    }

    function showCart()
    {
        $data['wishlist'] = $this->wishlistModel->getOneWishlist();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setJavascript(array('/js/controller/showCartCtrl.js'))
                ->setCss(array('/style/customerList.css'))
                ->setData($data)
                ->render('cart/showCart');
    }

    function cartProductsService()
    {
        header('Content-Type: application/json');
        $user = User::getCurrentUser();
        $mapper = CartMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes();
        $products = $mapper->findAll(function($rawData, $instance)
        {
            $instance->seller_name = $rawData['seller_name'];
        });
        $json = array(
            'notifications' => array(),
            'products'      => array()
        );
        foreach ($products as $product)
        {
            /* @var $product ProductFixedDomain */
            $images = $product->getImages('thumbnail');
            $obj = (array) $product;
            $obj['quantity'] = $product->quantity;
            $obj['price'] = $product->getPriceMoney($user->getCurrency())->getAmount();
            $obj['name'] = (string) $product->getName()->getTrueValue();
            $obj['taxes'] = $product->calculateTaxes($user->getCurrency())->getAmount();
            $obj['thumbnail'] = (string) $images[0]->url;
            $obj['stock'] = (double) strval($product->getQuantity());
            $obj['url'] = '/product/details/' . $product->id;
            if (strval($product->getQuantity()) < $product->quantity)
            {
                $json['notifications'][] = 'Sản phẩm "' . $product->getName() . '" đã hết trong kho, bạn cần giảm số lượng mua hoặc loại bỏ khỏi giỏ hàng.';
            }
            $json['products'][] = $obj;
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

    function moveToWishlist($productID)
    {
        CartMapper::make()->removeFromCart($productID);
        $this->wishlistModel->addToWishlist($productID);
    }

    function addToCart($productID = NULL)
    {
        $qty = 1;
        if ($this->input->get())
        {
            $qty = (int) $this->input->get('sel_qty');
            $productID = (int) $this->input->get('hdn_product');
        }
        CartMapper::make()->addToCart($productID, $qty);
        redirect($this->_controller . '/showCart');
    }

    function removeFromCart($productID)
    {
        CartMapper::make()->removeFromCart($productID);
    }

}
