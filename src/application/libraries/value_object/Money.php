<?php

class Money
{

    protected $_amount;
    protected $_currency;

    function __construct($amount, $currency)
    {
        $this->_amount = $amount;
        $this->_currency = $currency;
    }

    function getCurrency()
    {
        return new Currency($this->_currency->getCode());
    }

    function getAmount()
    {
        return $this->_amount;
    }

    function getCeiledAmount()
    {
        return round($this->_amount, 2, PHP_ROUND_HALF_UP);
    }

    function add(Money $money)
    {
        return new static($this->getAmount() + $money->getAmount());
    }

    function multiply($float)
    {
        return new static($this->getAmount() * $float);
    }

    function sub(Money $money)
    {
        return new static($this->getAmount() - $money->getAmount());
    }

    function div($float)
    {
        return new static($this->getAmount() / $float);
    }

    protected function _checkSameCurrency(Currency $currency)
    {
        if ($this->_currency->isEqual($currency) == false)
        {
            throw new Lynx_BusinessLogicException("So sánh phải cùng Currency");
        }
    }

    function isEqual(Money $money)
    {
        $this->_checkSameCurrency($money->getCurrency());
        return ($money->getAmount() == $this->getAmount());
    }

    function isGreaterThan(Money $money)
    {
        $this->_checkSameCurrency($money->getCurrency());
        return ($this->getAmount() > $money->getAmount());
    }

    function isLesserThan(Money $money)
    {
        $this->_checkSameCurrency($money->getCurrency());
        return ($this->getAmount() < $money->getAmount());
    }

    function isGreaterNEqualThan(Money $money)
    {
        $this->_checkSameCurrency($money->getCurrency());
        return ($this->getAmount() >= $money->getAmount());
    }

    function isLesserNEqualThan(Money $money)
    {
        $this->_checkSameCurrency($money->getCurrency());
        return ($this->getAmount() <= $money->getAmount());
    }

    function convert(Currency $currency)
    {
        $rate = $currency->getExchangeRate() / $this->getCurrency()->getExchangeRate();
        return $this->multiply($rate);
    }

}
