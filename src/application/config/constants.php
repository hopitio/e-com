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
    CONST DEFAULT_FORMAT_DATE = 'YYYY-MM-DD HH:MM:SS';
    CONST USER_STATUS_REGISTED = 0;
    CONST USER_STATUS_OPENED = 1;
    CONST USER_STATUS_CLOSED = 2;
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
    CONST phoneno = 'phoneno';
    CONST bonus = 'bonus';
    CONST alternative_email = 'alternative_email';
}




