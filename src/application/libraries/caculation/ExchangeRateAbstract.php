<?php

abstract class ExchangeRateAbstract
{

    abstract function getBuy($currency_string);

    abstract function getSell($currency_string);

    abstract function getTransfer($currency_string);
}
