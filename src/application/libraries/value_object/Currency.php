<?php

class Currency
{

    protected $_code;
    static protected $_map = array();

    function __construct($code)
    {
        $this->_code = $code;
    }

    function getExchangeRate()
    {
        //singleton
        return static::$_map[$this->_code];
    }

    function getCode()
    {
        return $this->_code;
    }

    function isEqual(Currency $currency)
    {
        return ($this->getCode() == $currency->getCode());
    }

}
