<?php

class Currency
{

    protected $_code;

    /** @var ExchangeRateAbstract */
    static protected $_exchange_rate;

    function __construct($code)
    {
        static::$_exchange_rate = ExchangeRateFactory::makeExchangeRate('Vietcombank');
        $this->_code = $code;
    }

    function getSellRate()
    {
        return static::$_exchange_rate->getSell($this->_code);
    }

    function getTransferRate()
    {
        return static::$_exchange_rate->getTransfer($this->_code);
    }

    function getBuyRate()
    {
        return static::$_exchange_rate->getBuy($this->_code);
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
