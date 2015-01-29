<?php

class VietcombankExchangeRate extends ExchangeRateAbstract
{
    CONST FILE_PATH = '/cache/exchange_rate.vietcombank.xml';
    protected $_data;
    protected $_exchange_data;
    
    /**
     * 
     * @param unknown $exchange_data
     */
    function __construct($exchange_data = null){
        $this->_exchange_data = $exchange_data;
    }
    
    protected function _get_data()
    {
        if (empty($this->_data))
        {
            $this->_exchange_data = empty($this->_exchange_data) ? file_get_contents(APPPATH . self:: FILE_PATH) : $this->_exchange_data;
            $this->_data = simplexml_load_string($this->_exchange_data);
        }
        return $this->_data;
    }

    function getBuy($currency_string)
    {
        if ($currency_string == 'VND')
        {
            return 1;
        }
        $row = $this->_xpath('//Exrate[@CurrencyCode="' . $currency_string . '"]');
        if (!$row)
        {
            return false;
        }
        return (double) $row->attributes()->Buy;
    }

    function getSell($currency_string)
    {
        if ($currency_string == 'VND')
        {
            return 1;
        }
        $row = $this->_xpath('//Exrate[@CurrencyCode="' . $currency_string . '"]');
        if (!$row)
        {
            return false;
        }
        return (double) $row->attributes()->Sell;
    }

    function getTransfer($currency_string)
    {
        if ($currency_string == 'VND')
        {
            return 1;
        }
        $row = $this->_xpath("Exrate[@CurrencyCode='$currency_string']");
        if (!$row)
        {
            return false;
        }
        return (double) $row->attributes()->Transfer;
    }
    
    function getExchangeData(){
        if(empty($this->_data)){
            $this->_get_data();
        }
        return $this->_exchange_data;
    }

    /**
     * 
     * @param SimpleXMLElement $dom
     * @param type $xpath
     */
    protected function _xpath($xpath)
    {
        $data = $this->_get_data();
        if (!$data)
        {
            return false;
        }
        $result = $data->xpath($xpath);

        if (isset($result[0]))
        {
            return $result[0];
        }
        elseif ($result instanceof SimpleXMLElement)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

}
