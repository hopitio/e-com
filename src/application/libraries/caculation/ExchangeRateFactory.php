<?php

class ExchangeRateFactory
{

    static function makeExchangeRate($name)
    {
        switch ($name) {
            case 'Vietcombank':
                require_once __DIR__ . '/VietcombankExchangeRate.php';
                return new VietcombankExchangeRate;
        }
    }

}
