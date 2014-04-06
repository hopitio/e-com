<?php

defined('BASEPATH') or die('No direct script access allowed');

class PinMapper extends ProductFixedMapper
{

    /** @var int $_user */
    protected $_user;

    function __construct($domain = 'ProductFixedDomain')
    {
        parent::__construct($domain);
    }

    function setUser($user_id)
    {
        $this->_user = (int) $user_id;
        return $this;
    }

    /**
     * Một số hàm trước khi gọi cần setUser
     * @throws Lynx_BusinessLogicException
     */
    protected function _isSetUser()
    {
        if (!$this->_user)
        {
            throw new Lynx_BusinessLogicException("setUser trước");
        }
    }

    function select($fields = 'p.*')
    {
        return parent::select($fields);
    }

    function findAll()
    {
        $this->_isSetUser();
        $this->_query->innerJoin('t_pin pin', 'pin.fk_user=' . $this->_user);
        return parent::findAll($fields);
    }

    function pin($product_id)
    {
        $this->_isSetUser();
        return DB::insert('t_pin', array('fk_product' => $product_id, 'fk_user' => $this->_user));
    }

    function unpin($product_id)
    {
        $this->_isSetUser();
        return DB::delete('t_pin', 'fk_user=? AND fk_product=?', array($this->_user, $product_id));
    }

}
