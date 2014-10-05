<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wishlist extends BaseController
{

    protected $authorization_required = true;

    /** @return WishlistModel */
    public $wishlistModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/WishlistModel', 'wishlistModel');
    }

    function remove($wishlistDetailID)
    {
        $detailInstance = WishListDetailMapper::make()->select('p.*,wd.*', true)->filterWishlistDetailID($wishlistDetailID)->find();
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
        $user = User::getCurrentUser();
        $mapper = WishListDetailMapper::make()
                ->select('p.*, wd.id AS wishlistDetailID', true)
                ->filterWishlist($wishlistID)
                ->filterStatus(1)
                ->autoloadAttributes()
                ->autoloadTaxes()
                ->setLanguage($user->languageKey);
        $mapper
                ->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
        $details = $mapper->findAll(function($rawData, $instance)
        {
            $instance->seller_name = $rawData['seller_name'];
            $instance->wishlistDetailID = $rawData['wishlistDetailID'];
        });
        $json = array();
        foreach ($details as $product)
        {
            $images = $product->getImages('thumbnail');
            /* @var $instance WishlistDetailDomain */
            $obj = (array) $product;
            $obj['price'] = $product->getFinalPriceMoney($user->getCurrency())->getAmount();
            $obj['name'] = (string) $product->getName();
            $obj['taxes'] = $product->calculateTaxes($user->getCurrency())->getAmount();
            $obj['thumbnail'] = (string) $images[0]->url;
            $obj['stock'] = (double) strval($product->getQuantity());
            $obj['url'] = '/product/details/' . $product->id;

            $json[] = $obj;
        }
        echo json_encode($json);
    }

    function addToWishlist($productID = NULL)
    {
        if ($this->input->get())
        {
            $productID = (int) $this->input->get('hdn_product');
        }
        $this->wishlistModel->addToWishlist($productID);
        if ($this->input->get())
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
        $detailInstance = WishListDetailMapper::make()
                ->select('wd.*', true)
                ->find($detailID);
        if (!$this->wishlistModel->isOwner(User::getCurrentUser()->id, $detailInstance->fkWishlist))
        {
            throw new Lynx_RequestException("You are not owner");
        }
        CartMapper::make()->addToCart($detailInstance->fkProduct);
        $this->remove($detailInstance->id);
    }

    function show($id = null)
    {
        $data['wishlist'] = $this->wishlistModel->getOneWishlist();

        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data, true)
                ->setCss(array('/style/customerList.css'))
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
