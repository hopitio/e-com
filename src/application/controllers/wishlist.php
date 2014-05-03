<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wishlist extends BaseController
{

    /** @return WishlistModel */
    public $wishlistModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/WishlistModel', 'wishlistModel');
    }

    function remove($wishlistDetailID)
    {
        $detailInstance = WishListDetailMapper::make()->filterID($wishlistDetailID)->find();
        if (!$this->wishlistModel->isOwner(User::getCurrentUser()->id, $detailInstance->fkWishlist))
        {
            throw new Lynx_RequestException("You are not owner");
        }
        $this->wishlistModel->updateDetailStatus($wishlistDetailID, 0);
    }

    /**
     * 
     * @param type $wishlistID
     * @return WishListDetailDomain
     */
    function wishlistDetailService($wishlistID)
    {
        header('Content-type: application/json');
        $details = $this->wishlistModel->getAllDetails($wishlistID);
        $json = array();
        foreach ($details as $instance)
        {
            /* @var $instance WishlistDetailDomain */
            $obj = (array) $instance;
            $obj['price'] = $instance->getPrice('USD')->getTrueValue();
            $obj['name'] = $instance->getName()->getTrueValue();
            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function addToWishlist($productID = NULL)
    {
        if ($this->input->post())
        {
            $productID = (int) $this->input->post('hdn_product');
        }
        $this->wishlistModel->addToWishlist($productID);
        if ($this->input->post())
        {
            redirect('/wishlist/show');
        }
    }

    function restoreWishlistDetail($detailID)
    {
        if (!$this->wishlistModel->isOwner(User::getCurrentUser()->id, $detailInstance->fkWishlist))
        {
            throw new Lynx_RequestException("You are not owner");
        }
        $this->wishlistModel->restore($detailID);
    }

    function addToCart($detailID)
    {
        $detailInstance = WishListDetailMapper::make()->find($detailID);
        if (!$this->wishlistModel->isOwner(User::getCurrentUser()->id, $detailInstance->fkWishlist))
        {
            throw new Lynx_RequestException("You are not owner");
        }
        CartMapper::make()->addToCart($detailInstance->fkProduct);
        $this->wishlistModel->remove($detailInstance->id);
    }

    function show($id = null)
    {
        $data['wishlist'] = $this->wishlistModel->getOneWishlist();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data, true)
                ->setJavascript(array('/js/angular.min.js'))
                ->render('wishlist/show');
    }

    function undoRemove($detailID)
    {
        $detailInstance = WishListDetailMapper::make()->filterID($detailID)->find();
        if (!$this->wishlistModel->isOwner(User::getCurrentUser()->id, $detailInstance->fkWishlist))
        {
            throw new Lynx_RequestException("You are not owner");
        }
        $this->wishlistModel->updateDetailStatus($detailID, 1);
    }

}
