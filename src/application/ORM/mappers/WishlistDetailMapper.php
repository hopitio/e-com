<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishListDetailMapper extends ProductFixedMapper
{

    function __construct($domain = 'WishlistDetailDomain')
    {
        parent::__construct($domain);
        $this->_query->innerJoin('t_wishlist_detail wd', 'wd.fk_product=p.id');
    }

    function filterWishlist($wishlist_id)
    {
        $this->_query->where('wd.fk_wishlist=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $wishlist_id;
        return $this;
    }

    function filterProductID($productID)
    {
        $this->_query->where('wd.fk_product=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $productID;
        return $this;
    }

}
