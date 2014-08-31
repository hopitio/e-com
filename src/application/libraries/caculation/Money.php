<?php

class Money
{

    protected $_amount;

    /** @var Currency */
    protected $_currency;

    function __construct($amount, Currency $currency)
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
        return new static($this->getAmount() + $money->getAmount(), new Currency($this->_currency->getCode()));
    }

    function multiply($float)
    {
        return new static($this->getAmount() * $float, new Currency($this->_currency->getCode()));
    }

    function sub(Money $money)
    {
        return new static($this->getAmount() - $money->getAmount(), new Currency($this->_currency->getCode()));
    }

    function div($float)
    {
        return new static($this->getAmount() / $float, new Currency($this->_currency->getCode()));
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
        $rate = $this->getCurrency()->getTransferRate() / $currency->getTransferRate();
        return new Money($this->_amount * $rate, clone $currency);
    }

    function __toString()
    {
        switch ($this->_currency->getCode()) {
            case 'USD':
                return '$' . format_money($this->_amount);
            case 'VND':
                return format_money($this->_amount, 0) . 'đ';
            case 'KRW':
                return '&#8361;' . format_money($this->_amount);
        }
    }

}

/**
 * 
 * @param double $amount
 * @return string
 */
function format_money($amount, $precision = 2)
{
    return number_format((double) $amount, $precision);
}

/**
 * Hàm javascript để hiển thị money từ double. vd: 10.00 => $10.00
 */
function getJavascriptMoneyFunction($currency)
{
    switch ($currency) {
        case 'USD':
            return "function(a){var b=a.formatMoney(0);var c=a.formatMoney(1);var d=a.formatMoney(2);return '$'+(a==b?b:a==c?c:d); }";
        case 'KRW':
            return "function(a){var b=a.formatMoney(0);var c=a.formatMoney(1);var d=a.formatMoney(2);return '₩'+(a==b?b:a==c?c:d); }";
        case 'VND':
            return "function(a){return a.formatMoney(0)+'đ';}";
    }
}
