<?php

class VietcombankExchangeRate extends ExchangeRateAbstract
{

    protected $_data;

    protected function _get_data()
    {
        if ($this->_data === null)
        {
            $this->_data = simplexml_load_file(APPPATH . '/cache/exchange_rate.vietcombank.xml');
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
