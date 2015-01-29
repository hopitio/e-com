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
    
    function convertToCurrentCurrencyByExchangeRate($amount,$exchange_rate,$currentCurrency = 'VND'){
        $money = new Money($amount, new Currency($currentCurrency,$exchange_rate));
        return $money->convert(new Currency($this->obj_user->getCurrency(),$exchange_rate))->getAmount();
    }
    
}