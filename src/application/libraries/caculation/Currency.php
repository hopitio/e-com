<?php

class Currency
{

    protected $_code;

    /** @var ExchangeRateAbstract */
    public $_exchange_rate;

    function __construct($code,ExchangeRateAbstract $exchange_rate = null)
    {
        if(empty($exchange_rate)){
            $this->_exchange_rate = ExchangeRateFactory::makeExchangeRate(ExchangeRateFactory::EXCHANGE_NAME_VIETCOMBANK);
        }else{
            $this->_exchange_rate = $exchange_rate;
        }
        $this->_code = $code;
    }

    function getSellRate()
    {
        return $this->_exchange_rate->getSell($this->_code);
    }

    function getTransferRate()
    {
        return $this->_exchange_rate->getTransfer($this->_code);
    }

    function getBuyRate()
    {
        return $this->_exchange_rate->getBuy($this->_code);
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
