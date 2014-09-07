<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
$config['support_currency'] = array('USD' => 'USD','VND' => 'VND','KRW'=>'KRW');
$config['rate_vietcombank_url'] = array('vietcommbank' => 'http://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx');
$config['payment_gateway_supported'] = array(
    'NganLuong' => array(
        'displayName' => 'Ngân Lượng',
        'isPercent' => '1',
        'value' => 0
    ),
    'CASH' => array(
        'displayName' => 'Tiền mặt / Cash / 현금',
        'isPercent' => '1',
        'value' => 0
    ),
);

$config['ngan_luong'] = array(
    'NGANLUONG_URL' => 'http://localhost.com/portal/__mock/ngan_luong_payment',
    'MERCHANT_ID'=> '33812',
    'MERCHANT_PASS'=>'qazwsxedc',
    'receiver' => 'transaction@sfriendly.com',
    'return_url' => 'http://localhost.com/portal/order/nganluong_callback',
    'order_name' => 'SFRIENDLY',
);


/* End of file config.php */
/* Location: ./application/config/maintenance.php */

