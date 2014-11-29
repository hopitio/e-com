<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('MAILLER_PROTOCOL','protocol');
define('MAILLER_USERAGENT','useragent');
define('MAILLER_HOST','smtp_host');
define('MAILLER_FULLNAME','smtp_fullName');
define('MAILLER_USER','smtp_user');
define('MAILLER_PORT','smtp_port');
define('MAILLER_PASS','smtp_pass');
define('MAILLER_TIMEOUT','smtp_timeout');
define('MAILLER_TEMP','temp');
define('MAILLER_TYPE','mailtype');
define('MAILLER_NEWLINE','newline');

$config['temp_mail_folder'] = APPPATH . 'temp/mail/';
$config['temp_mail_view'] = 'mail/';
$config['ConfirmRegisterMailler']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/CreatedAccount',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);
$config['ResetPasswordMailler']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/ChangePassword',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);
$config['NewPasswordMailler']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/ForgetPassword',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['Buyer_order_places']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderPlace',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderAskReview']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderAskReview.html',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderCancel']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderCancel.html',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderDelivered']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderDelivered',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderFailToDelivered']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderFailToDelivered.html',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderRefundOrder']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderRefuned.php',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['OrderShipping']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/OrderShipping.php',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['SellerDelivered']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/SellerDelivered',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['SellerFailToDeliveredMailler']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/SellerFailToDelivered.html',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);

$config['SellerPaymentVerified']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/SellerVerified',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);






