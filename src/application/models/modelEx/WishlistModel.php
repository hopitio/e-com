<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistModel extends BaseModel
{

    /**
     * 
     * @param type $productID
     * @return type
     * @throws Lynx_BusinessLogicException Khi trùng product
     */
    function addToWishlist($productID)
    {
        $wishlist = $this->getOneWishlist();
        //validate
        $duplicate = WishListDetailMapper::make()
                ->filterWishlist($wishlist->id)
                ->filterProductID($productID)
                ->findAll();
        if (!empty($duplicate))
        {
            throw new Lynx_BusinessLogicException("product_already_exists");
        }
        return DB::insert('t_wishlist_detail', array(
                    'fk_wishlist' => $wishlist->id,
                    'fk_product' => $productID
        ));
    }

    /**
     * @return WishlistDomain
     */
    function getOneWishlist()
    {
        $user = User::getCurrentUser();
        $wishlist = WishlistMapper::make()
                ->filterCustomer($user->id)
                ->limit(1)
                ->findAll();
        $wishlist = reset($wishlist);
        if (!$wishlist || !$wishlist->id)
        {
            $wishlistID = WishlistMapper::make()->insert();
            $wishlist = WishlistMapper::make()->find($wishlistID);
        }
        return $wishlist;
    }

    /**
     * 
     * @param type $wishlistID
     * @return type
     */
    function getAllDetails($wishlistID)
    {
        $user = User::getCurrentUser();
        $details = WishListDetailMapper::make()
                ->filterWishlist($wishlistID)
                ->autoloadAttributes(true, $user->languageKey)
                ->findAll();
        return $details;
    }

}
