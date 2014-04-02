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
            $json[] = array(
                
            );
        }
    }

    function addToWishlist($productID)
    {
        $this->wishlistModel->addToWishlist($productID);
    }

    function show($id = null)
    {
        $data['wishlist'] = $this->wishlistModel->getOneWishlist();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data, true)
                ->render('wishlist/show');
    }

}
