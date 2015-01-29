<?php
class BasePortalController extends BaseController{
    
    protected $is_portal_controller = true;
    function init(){
        parent::init();
    }
    
    function convertToCurrentCurrency($amount,$currentCurrency = 'VND')
    {
        $money = new Money($amount, new Currency($currentCurrency));
        return $money->convert(new Currency($this->obj_user->getCurrency()))->getAmount();
    }
    
    function convertToCurrentCurrencyByExchangeRate($amount,ExchangeRateAbstract $exchange_rate,$currentCurrency = 'VND'){
        $currency = new Currency($currentCurrency,$exchange_rate);
        $money = new Money($amount, $currency);
        $target_currency = new Currency($this->obj_user->getCurrency(),$exchange_rate);
        $re = $money->convert($target_currency)->getAmount();
        return $re;
    }
    
}