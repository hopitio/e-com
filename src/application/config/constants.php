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
    CONST LANGUAGE_SETTINGKEY = 'LANGUAGE';
    CONST CURRENCY_SETTINGKEY = 'CURRENCY';
    
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
    CONST USER_HISTORY_ACTION_ORDER = 'PAYMENT';
    CONST USER_HISTORY_ACTION_CHANGEPASS = 'CHANGEPASS';
    CONST USER_HISTORY_ACTION_RESETPASS = 'RESETPASS';
    CONST USER_HISTORY_ACTION_CHANGEINFORMATION = 'CHANGEINFORMATION';
    
    CONST INVOICE_TYPE_INPUT = "INPUT";
    CONST INVOICE_TYPE_OUTPUT = "OUTPUT";
    
    CONST ORDER_STATUS_VERIFYING = 'VERIFYING';
    CONST ORDER_STATUS_SHIPPING = 'SHIPPING';
    CONST ORDER_STATUS_DELIVERED = 'DELIVERED';
    CONST ORDER_STATUS_ORDER_PLACED = 'ORDER_PLACED';
    CONST ORDER_STATUS_ORDER_CANCELLED = 'ORDER_CANCELLED';
    CONST ORDER_STATUS_REJECTED = 'REJECTED';
    
    CONST SHIPPING_STATUS_ACTIVE = "ACTIVE";
    CONST SHIPPING_STATUS_INACTIVE = "INACTIVE";
    CONST SHIPPING_TYPE_PAY = "PAY";
    CONST SHIPPING_TYPE_SHIP = "SHIP";
    
    CONST PAYMENT_BY_NGANLUONG = "PAYMENT_BY_NGANLUONG";
    CONST PAYMENT_BY_VISA = "PAYMENT_BY_VISA";
    CONST PAYMENT_BY_ONEPAY = "PAYMENT_BY_ONEPAY";
    
    CONST USER_TYPE_ADMIN = "ADMIN";
    CONST USER_TYPE_USER = "USER";
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
    CONST user_type = 'user_type';
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
    CONST action_date = 'action_date';
}

class T_user_setting{
    CONST id = 'id';
    CONST tableName = 't_user_setting';
    CONST setting_key = 'setting_key';
    CONST value = 'value';
    CONST fk_user = 'fk_user';
}

class T_product
{
    CONST tableName = "t_product";
    CONST id = "id";
    CONST sub_id = "sub_id";
    CONST name = "name";
    CONST sub_image = "sub_image";
    CONST short_description = "short_description";
    CONST price = "price";
    CONST quantity = "quantity";
    CONST total_price = "total_price";
    CONST actual_price = "actual_price";
    CONST seller_id = "seller_id";
    CONST seller_name = "seller_name";
    CONST seller_email = "seller_email";
}

class T_invoice{
    CONST tableName = "t_invoice";
    CONST id = "id";
    CONST fk_order = "fk_order";
    CONST created_user = "created_user";
    CONST created_date = "created_date";
    CONST paid_date = "paid_date";
    CONST cancelled_date = "cancelled_date";
    CONST rejected_date = "rejected_date";
    CONST comment = "comment";
    CONST payment_id = "payment_id";
    CONST payment_method = "payment_method";
    CONST payment_currency = "payment_currency";
    CONST invoice_type = "invoice_type";
}
class T_invoice_other_cost{
    CONST tableName = "t_invoice_other_cost";
    CONST id = "id";
    CONST fk_invoice = "fk_invoice";
    CONST value = "value";
    CONST comment = "comment";
}
class T_invoice_product{
    CONST tableName = "t_invoice_product";
    CONST id = "id";
    CONST fk_invoice = "fk_invoice";
    CONST fk_product = "fk_product";
}
class T_invoice_shipping{
    CONST tableName = "t_invoice_shipping";
    CONST id = "id";
    CONST sub_id = "sub_id";
    CONST fk_invoice = "fk_invoice";
    CONST fk_user_contact = "fk_user_contact";
    CONST created_user = "created_user";
    CONST display_name = "display_name";
    CONST price = "price";
    CONST status = "status";
    CONST created_date = "created_date";
    CONST ship_date = "ship_date";
    CONST complete_date = "complete_date";
    CONST shipping_type = "shipping_type";
}
class T_order{
    CONST tableName = "t_order";
    CONST id = "id" ;
    CONST sub_key = "sub_key" ;
    CONST fk_user = "fk_user" ;
    CONST created_user = "created_user" ;
    CONST created_date = "created_date" ;
    CONST shiped_date = "shiped_date" ;
    CONST canceled_date = "canceled_date" ;
    CONST completed_date = "completed_date" ;
    
}
class T_payment_temp{
    CONST tableName = 't_payment_temp';
    CONST id = "id";
    CONST fk_user = "fk_user";
    CONST created_date = "created_date";
    CONST data = "data";
    CONST session_id = "session_id";
    CONST ip_address = "ip_address";
    CONST user_agrent = "user_agrent";
    CONST processed_date = "processed_date";
    CONST cancelled_date = "cancelled_date";
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
    CONST id = "id";
    CONST fk_order = "fk_order";
    CONST status = "status";
    CONST updated_user = "updated_user";
    CONST updated_date = "updated_date";
    CONST comment = "comment";
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
class T_user_contact{
    const tableName = "t_user_contact";
    CONST id = "id";
    CONST fk_user = "fk_user";
    CONST date_created = "date_created";
    CONST full_name = "full_name";
    CONST telephone = "telephone";
    CONST street_address = "street_address";
    CONST city_district = "city_district";
    CONST state_province = "state_province";
    CONST email_contact = "email_contact";
}
class T_tax{
    const tableName = "t_tax";
    CONST id = "id";
    CONST fk_product = "fk_product";
    CONST sub_tax_id = "sub_tax_id";
    CONST sub_tax_name = "sub_tax_name";
    CONST sub_tax_value = "sub_tax_value";
}





