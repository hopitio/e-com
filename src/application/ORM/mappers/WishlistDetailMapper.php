<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishListDetailMapper extends ProductFixedMapper
{

    function __construct($domain = 'WishlistDetailDomain')
    {
        parent::__construct($domain);
        $this->_query->innerJoin('t_wishlist_detail wd', 'wd.fk_product=p.id');
        $this->_map['fkWishlist'] = 'fk_wishlist';
        $this->_map['fkProduct'] = 'fk_product';
    }

    function filterWishlist($wishlist_id)
    {
        $this->_query->where('wd.fk_wishlist=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $wishlist_id;
        return $this;
    }

    function filterStatus($status)
    {
        $this->_query->where('wd.status=' . intval($status));
        return $this;
    }

    function filterProductID($productID)
    {
        $this->_query->where('wd.fk_product=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $productID;
        return $this;
    }

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return WishlistDetailDomain
     */
    function find()
    {
        $query = Query::make()->select($fields)
                ->from('t_wishlist_detail wd')
                ->innerJoin('t_product p', 'wd.fk_product=p.id')
                ->where('wd.id=?');
        $record = DB::getInstance()->GetRow($query, array($id));
        return $this->makeDomain($record);
    }

    function select($fields = 'wd.*, p.fk_category, p.fk_retailer, p.fk_group, p.is_group')
    {
        parent::select($fields);
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return WishlistDetailMapper
     */
    function findAll($fields = 'wd.*, p.fk_category, p.fk_retailer, p.fk_group, p.is_group')
    {
        return parent::findAll($fields);
    }

}
