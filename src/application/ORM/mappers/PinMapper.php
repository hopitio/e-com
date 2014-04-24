<?php

defined('BASEPATH') or die('No direct script access allowed');

class PinMapper extends ProductFixedMapper
{

    /** @var int $_user */
    protected $_user;

    function __construct($domain = 'PinDomain')
    {
        parent::__construct($domain);
        $this->_map = array(
            'fkUser'    => 'fk_user',
            'fkProduct' => 'fk_product'
                ) + $this->_map;
        $this->_query->orderBy('pin.id');
    }

    function setUser($user_id)
    {
        $this->_user = (int) $user_id;
        $this->_query->innerJoin('t_pin pin', 'pin.fk_product = p.id AND pin.fk_user=' . $this->_user);
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

    function select($fields = 'pin.*, p.*', $reset = false)
    {
        parent::select($fields, $reset);
        return $this;
    }

    /** @return PinDomain */
    function findAll($callback = null)
    {
        $this->_isSetUser();
        return parent::findAll($callback);
    }

}
