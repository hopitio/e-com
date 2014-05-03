<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistModel extends BaseModel
{

    /**
     * 
     * @param type $productID
     * @return bool
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
            $detailInstance = $duplicate[0];
            /* @var $detailInstance WishlistDetailDomain */
            if ($detailInstance->status)
            {
                return;
            }
            DB::delete('t_wishlist_detail', 'id=?', array($detailInstance->id));
        }
        DB::insert('t_wishlist_detail', array(
            'fk_wishlist' => $wishlist->id,
            'fk_product' => $productID
        ));
        if (DB::getInstance()->ErrorNo())
        {
            throw new Lynx_BusinessLogicException("error_occurs_during_insert");
        }
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
     * @return WishlistDetailDomain
     */
    function getAllDetails($wishlistID)
    {
        $user = User::getCurrentUser();
        $details = WishListDetailMapper::make()
                ->filterWishlist($wishlistID)
                ->filterStatus(1)
                ->autoloadAttributes()
                ->setLanguage($user->languageKey)
                ->findAll();
        return $details;
    }

    function updateDetailStatus($detailID, $status)
    {
        return DB::update('t_wishlist_detail', array('status' => $status ? 1 : 0), 'id=?', array($detailID));
    }

    /**
     * 
     * @param type $userID
     * @param type $wishlistID
     * @return bool
     */
    function isOwner($userID, $wishlistID)
    {
        return ((bool) DB::getInstance()->getOne("SELECT w.id FROM t_wishlist w WHERE w.fk_customer=? AND w.id=?", array($userID, $wishlistID)));
    }

}
