<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/**
 * Khai báo lưu constant
 * @var unknown
 */
define('USER_SESSION', 'USER_SESSION');
define('CATEGORY','CATEGORY');
define('platform_login_url','platform_login_url');
define('platform_login_callback','platform_login_callback');
define('platform_logout','platform_logout');


//Database defined
class DatabaseFixedValue{
    CONST DEFAULT_FORMAT_DATE = 'Y-m-d h:m:s';
    CONST USER_STATUS_REGISTED = 0;
    CONST USER_STATUS_OPENED = 1;
    CONST USER_STATUS_CLOSED = 2;
    
    CONST USER_PLATFORM_DEFAULT = 0;
    CONST USER_PLATFORM_FACEBOOK = 1;
    CONST USER_PLATFORM_GOOGLE = 2;
    
    CONST USER_SETTING_KEY_RecivedEmail = 'isRecivedEmail';
    CONST USER_SETTING_KEY_RecivedEmail_HAVERECIVE = 'Y';
    CONST USER_SETTING_KEY_RecivedEmail_HAVENOTRECIVE = 'N';
    CONST USER_SETTING_KEY_AlternativeEmail = 'AlternativeEmail';
    
    CONST SECURITY_QUESTION_SETTINGKEY = 'SQ';
    CONST SECURITY_ANSWER_SETTINGKEY = 'SA';
    
    CONST SECURITY_QUESTION_NO0_ID = '0';
    CONST SECURITY_QUESTION_NO1_ID = '1';
    CONST SECURITY_QUESTION_NO2_ID = '2';
    CONST SECURITY_QUESTION_NO3_ID = '3';
    CONST SECURITY_QUESTION_NO4_ID = '4';
    CONST SECURITY_QUESTION_NO5_ID = '5';
    
    CONST USER_HISTORY_ACTION_RETURN = 'RETURN';
    CONST USER_HISTORY_ACTION_REGISTE = 'REGISTE';
    CONST USER_HISTORY_ACTION_LOGIN = 'LOGIN';
    CONST USER_HISTORY_ACTION_NONE = 'NONE';
    CONST USER_HISTORY_ACTION_LOGOUT = 'LOGOUT';
    CONST USER_HISTORY_ACTION_PAYMENT = 'PAYMENT';
    CONST USER_HISTORY_ACTION_CHANGEPASS = 'CHANGEPASS';
    CONST USER_HISTORY_ACTION_RESETPASS = 'RESETPASS';
    CONST USER_HISTORY_ACTION_CHANGEINFORMATION = 'CHANGEINFORMATION';
}
class TableName{
    CONST t_user = 't_user';
}

class T_user{
    CONST tableName = 't_user';
    CONST id = 'id';
    CONST firstname = 'firstname';
    CONST lastname = 'lastname';
    CONST account = 'account';
    CONST password = 'password';
    CONST sex = 'sex';
    CONST DOB = 'DOB';
    CONST date_joined = 'date_joined';
    CONST status = 'status';
    CONST status_date = 'status_date';
    CONST status_reason = 'status_reason';
    CONST last_active = 'last_active';
    CONST platform_key = 'platform_key';
}
class T_user_history{
    CONST tableName = 't_user_history';
    CONST id = "id";
    CONST fk_user = "fk_user";
    CONST secret_key = "secret_key";
    CONST client_ip ="client_ip";
    CONST user_agrent = "user_agrent";
    CONST last_activity = "last_activity";
    CONST sub_system_name = "sub_system_name";
    CONST description = "description";
    CONST action_name = "action_name";
    CONST session_id = 'session_id';
}

class T_user_setting{
    CONST id = 'id';
    CONST tableName = 't_user_setting';
    CONST setting_key = 'setting_key';
    CONST value = 'value';
    CONST fk_user = 'fk_user';
}

class T_product{
    CONST id = 'id';
    CONST tableName = "t_product";
    CONST sub_system_id = "sub_system_id";
    CONST sort_description = "sort_description";
    CONST sub_system_key = "sub_system_key";
    CONST product_image_url = "product_image_url";
}

class T_invoice{
    CONST id = 'id';
    CONST tableName = "t_invoice";
    CONST fk_order = 'fk_order';
    CONST fk_customer = 'fk_customer';
    CONST date_created = 'date_created';
    CONST date_paid = 'date_paid';
    CONST invoice_status = 'invoice_status';
    CONST fk_contact = 'fk_contact';
    CONST email_status = 'email_status';
    CONST comment = 'comment';
    CONST payment_method = 'payment_method';
    CONST payment_fees = 'payment_fees';
    CONST payment_actual = 'payment_actual';
    CONST payment_convert_rate = 'payment_convert_rate';
    CONST payment_currency_root = 'payment_currency_root';
    CONST payment_currency_target = 'payment_currency_target';
    
}

class T_invoice_detail{
    CONST id = 'id';
    CONST tableName = "t_invoice_detail";
    CONST fk_invoice = 'fk_invoice';
    CONST fk_order = 'fk_order';
    CONST quantity = 'quantity';
}

class T_order{
    CONST tableName = "t_order";
    CONST id = 'id';
    CONST fk_customer = 'fk_customer';
    CONST email_status = 'email_status';
    CONST fk_order_status_history = 'fk_order_status_history';
    CONST comment = 'comment';
    CONST bonus = 'bonus';
}

class T_order_product{
    CONST tableName = 't_order_product';
    CONST id  =  'id';
    CONST fk_order = 'fk_order';
    CONST sub_key = 'sub_key';
    CONST sub_id       = 'sub_id';
    CONST product_name     = 'product_name';
    CONST product_image    = 'product_image';
    CONST short_description= 'short_description';
    CONST price            = 'price';
    CONST quantity        = 'quantity';
    CONST total_price     = 'total_price';
    CONST actual_price = 'actual_price';
}

class T_order_status{
    CONST tableName = 't_order_status';
    CONST id = 'id';
    CONST name = 'name';
    CONST codename = 'codename';
    CONST sort = 'sort';
}
class T_order_status_history{
    const tableName = "t_order_status_history";
    CONST id = 'id';
    CONST fk_order = 'fk_order';
    CONST fk_status = 'fk_status';
    CONST date_happened = 'date_happened';
    CONST fk_creator = 'fk_creator';
    CONST date_created = 'date_created';
    CONST is_mail_sent = 'is_mail_sent';
}



