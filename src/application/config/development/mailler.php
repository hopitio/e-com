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
$config['ConfirmRegisterMailler']=  array(
    MAILLER_PROTOCOL => 'smtp',
    MAILLER_USERAGENT => 'Sfriendly',
    MAILLER_HOST => 'ssl://smtp.gmail.com',
    MAILLER_FULLNAME => 'Sfriendly Customer Service',
    MAILLER_USER => 'projecte2002@gmail.com',
    MAILLER_PORT => '465',
    MAILLER_PASS => '1234567$',
    MAILLER_TIMEOUT => '1',
    MAILLER_TEMP => '/RegisterConfirm.txt',
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
    MAILLER_TEMP => '/ResetPassword.txt',
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
    MAILLER_TEMP => '/NewPassword.txt',
    MAILLER_TYPE => 'html',
    MAILLER_NEWLINE=> "\r\n"
);


