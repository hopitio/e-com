<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistModel extends BaseModel
{

    function addToWishlist($productId)
    {
        
    }

    /**
     * @return WishlistDomain
     */
    function getOneWishlist()
    {
        $user = User::getCurrentUser();
        $wishlist = WishlistMapper::make()->filterCustomer($user->id)->limit(1)->findAll();
        if (!$wishlist || $wishlist->id)
        {
            $wishlistID = WishlistMapper::make()->insert();
            $wishlist = WishlistMapper::make()->find($wishlistID);
        }
        return $wishlist;
    }

}
