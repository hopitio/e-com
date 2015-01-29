<?php

class Currency
{

    protected $_code;

    /** @var ExchangeRateAbstract */
    static protected $_exchange_rate;

    function __construct($code, $exchange_rate = null)
    {
        if(empty($exchange_rate)){
            static::$_exchange_rate = ExchangeRateFactory::makeExchangeRate(ExchangeRateFactory::EXCHANGE_NAME_VIETCOMBANK);
        }else{
            static::$_exchange_rate = $exchange_rate;
        }
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
