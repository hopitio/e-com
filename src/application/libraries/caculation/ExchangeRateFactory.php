<?php

class ExchangeRateFactory
{
    CONST EXCHANGE_NAME_VIETCOMBANK = 'Vietcombank';
    static function makeExchangeRate($name)
    {
        switch ($name) {
            case self::EXCHANGE_NAME_VIETCOMBANK:
                require_once __DIR__ . '/VietcombankExchangeRate.php';
                return new VietcombankExchangeRate;
        }
    }
    
    static function getExchangeRate($name){
        switch ($name){
            case self::EXCHANGE_NAME_VIETCOMBANK;
                require_once __DIR__ . '/VietcombankExchangeRate.php';
                $vietcombank = new VietcombankExchangeRate;
                return $vietcombank->getExchangeData();
            break;
        }
    }
    
    /**
     * 
     * @param string $name
     * @param string $exchange_content
     */
    static function makeExchangeRateByContent($name,$exchange_content)
    {
        switch ($name){
        	case self::EXCHANGE_NAME_VIETCOMBANK;
            	require_once __DIR__ . '/VietcombankExchangeRate.php';
            	$vietcombank = new VietcombankExchangeRate($exchange_content);
            	return $vietcombank->getExchangeData();
        	break;
        }
    }

}
