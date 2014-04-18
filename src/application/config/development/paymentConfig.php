<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
$config['support_currency'] = array('USD' => 'USD','VND' => 'VND','KRW'=>'KRW');
$config['rate_vietcombank_url'] = array('vietcommbank' => 'http://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx');
$config['payment_gateway_supported'] = array(
    'visaAndMaster' => array(
        'displayName' => 'Visa',
        'isPercent' => '1',
        'value' => '0.05'
    ),
    'NganLuong' => array(
        'displayName' => 'Ngân Lượng',
        'isPercent' => '1',
        'value' => 0.05
    ),
    'Onepay' => array(
        'displayName' => 'Onepay',
        'isPercent' => '0',
        'value' => 10
    ),
);

/* End of file config.php */
/* Location: ./application/config/maintenance.php */

