<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistMapper extends MapperAbstract
{

    protected $_autoloadDetails = false;

    function __construct($domain = 'WishlistDomain')
    {
        $query = Query::make()->from('t_wishlist wl')->orderBy('wl.id');

        $map = array(
            'fkCustomer' => 'fk_customer',
            'remindDate' => 'remind_date',
            'dateCreated' => 'date_created'
        );

        parent::__construct($domain, $query, $map);
    }

    function filterCustomer($user_id)
    {
        $this->_query->where('wl.fk_customer=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $user_id;
        return $this;
    }

    function autoloadDetails($bool)
    {
        $this->_autoloadDetails = $bool;
        return $this;
    }

    function findAll($fields = '*')
    {
        $instances = parent::findAll($fields);
        if ($this->_autoloadDetails)
        {
            foreach ($instances as &$instance)
            {
                $this->loadDetails($instance);
            }
        }
        return $instance;
    }

    function find($id, $fields = '*')
    {
        $query = Query::make()->select($fields)->from('t_wishlist')->where('id=?');
        $record = DB::getInstance()->GetRow($query, array($id));
        $domain = $this->makeDomain($record);

        if ($this->_autoloadDetails)
        {
            $this->loadDetails($domain);
        }
        return $domain;
    }

    function loadDetails(WishlistDomain $wishlist)
    {
        $details = WishListDetailMapper::make()->filterWishlist($wishlist->id)->findAll();
        if (!$details)
        {
            return $wishlist;
        }
        foreach ($details as $detailInstance)
        {
            $wishlist->addWishlistDetail($detailInstance);
        }
        return $wishlist;
    }

    /**
     * 
     * @param array $rawData
     * @return int ID|false
     */
    function insert($rawData = array())
    {
        $rawData['fk_customer'] = User::getCurrentUser()->id;
        $rawData['name'] = 'main';
        $rawData['date_created'] = DB::getDate();
        return DB::insert('t_wishlist', $rawData);
    }

}
