<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wishlist extends BaseController
{

    function addToWishlist($productID)
    {
        $user = User::getCurrentUser();
        $wishlist = WishlistMapper::make()->filterCustomer($user->id)->limit(1)->findAll();
    }

    /** @return WishlistModel */
    protected function _wishlistModel()
    {
        return $this->load->model('Wishlist');
    }

    function show($id)
    {
        var_dump(User::getCurrentUser()->id);
    }

    function createWishlist()
    {
        
    }

}
