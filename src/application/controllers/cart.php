<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . 'helpers' . DS . 'ViewHelpers.php';

class cart extends BaseController
{

    protected $_CI;

    /** @var cartModel */
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
        $data['shippingMethods'] = ShippingMethodMapper::make()->setLanguage(User::getCurrentUser()->languageKey)->findAll();
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
                ->setJavascript(array('/js/controller/cartCtrl.js'))
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
            $obj['sales'] = $product->getSalePercent();
            $obj['thumbnail'] = (string) $images[0]->url;
            $obj['priceString'] = (string) $product->getFinalPriceMoney($user->getCurrency());
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

    function simpleShippingPriceService($locationCode)
    {
        $user = User::getCurrentUser();
        $products = CartMapper::make()
                ->setLanguage($user->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->findAll();
        $shippingMethods = ShippingMethodMapper::make()->setLanguage($user->languageKey)->findAll();
        $shippingLocations = ShippingLocationMapper::make()->filterLocation(null, $locationCode)->findAll();
        $sumWeight = 0;
        /* @var $products CartDomain */
        foreach ($products as $product)
        {
            $sumWeight += $product->getConvertedWeight() * (double) $product->quantity;
        }
        $json = array();
        foreach ($shippingMethods as $method)
        {
            foreach ($shippingLocations as $location)
            {
                if ($location->fkShippingMethod != $method->id)
                {
                    continue;
                }

                $json[] = array(
                    'code'  => $method->codename,
                    'desc'  => $method->description,
                    'label' => $method->label,
                    'price' => $this->cartModel->calculateShippingPrice($location, $sumWeight, new Currency($user->getCurrency()))
                );
            }
        }
        echo json_encode($json);
    }

    function advanceShippingPriceService()
    {
        $user = User::getCurrentUser();
        $productMethods = $this->input->post('methods');
        $locationCode = $this->input->post('location');
        $shippingMethods = ShippingMethodMapper::make()->setLanguage($user->languageKey)->findAll();
        $shippingLocations = ShippingLocationMapper::make()->filterLocation(null, $locationCode)->findAll();

        $products = CartMapper::make()
                ->setLanguage($user->languageKey)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->findAll();

        $json = array();
        foreach ($shippingMethods as $method)
        {
            if (!isset($productMethods[$method->codename]))
            {
                continue;
            }
            $sumWeight = 0;
            $productInMethod = $productMethods[$method->codename];
            foreach ($shippingLocations as $location)
            {
                if ($location->fkShippingMethod == $method->id)
                {
                    break;
                }
                else
                {
                    $location = null;
                }
            }
            if (!$location)
            {
                continue;
            }
            foreach ($productInMethod as $productID)
            {
                foreach ($products as $product)
                {
                    if ($productID !== $product->id)
                    {
                        continue;
                    }
                    $sumWeight+= $product->getConvertedWeight() * $product->quantity;
                }
                /* @var $product CartDomain */
                $json[$method->label] = $this->cartModel->calculateShippingPrice($location, $sumWeight, new Currency($user->getCurrency()));
            }
        }
        header('Content-type:application/json');
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
