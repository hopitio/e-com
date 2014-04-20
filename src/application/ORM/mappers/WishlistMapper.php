<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistMapper extends MapperAbstract
{

    protected $_autoloadDetails = false;
    protected $_language;

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

    function autoloadDetails($bool, $language)
    {
        $this->_autoloadDetails = $bool;
        $this->_language = $language;
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return WishlistDomain
     */
    function findAll()
    {
        $instances = parent::findAll();
        if ($this->_autoloadDetails)
        {
            foreach ($instances as &$instance)
            {
                $this->loadDetails($instance, $this->_language);
            }
        }
        return $instances;
    }

    /**
     * @return WishlistDomain
     */
    function find()
    {
        $domain = parent::find();

        if ($this->_autoloadDetails)
        {
            $this->loadDetails($domain, $this->_language);
        }
        return $domain;
    }

    function loadDetails(WishlistDomain $wishlist, $language)
    {
        $details = WishListDetailMapper::make()
                ->filterWishlist($wishlist->id)
                ->setLanguage($language)
                ->autoloadAttributes()
                ->findAll();
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
