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
$config['ngan_luong'] = array(
    'NGANLUONG_URL' => 'https://www.nganluong.vn/checkout.php',
    'MERCHANT_ID'=> '33804',
    'MERCHANT_PASS'=>'1234567$',
    'receiver' => 'transaction@sfriendly.com',
    'return_url' => 'http://sfriendly.com/portal/order/nganluong_callback'
);
/* End of file config.php */
/* Location: ./application/config/maintenance.php */

