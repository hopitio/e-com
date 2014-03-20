<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-20 18:51:57 --> Unable to load the requested class: common
ERROR - 2014-03-20 18:53:37 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 18:54:10 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 18:59:24 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 18:59:24 --> Unable to load the requested class: common
ERROR - 2014-03-20 18:59:30 --> Unable to load the requested class: common
ERROR - 2014-03-20 18:59:54 --> exception 'Lynx_ErrorException' with message 'Undefined property: home::$session' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:277
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(277): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 277, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(207): MY_Controller->set_obj_user_to_me()
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(70): MY_Controller->init()
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#5 {main}
ERROR - 2014-03-20 19:00:06 --> Unable to load the requested class: common
ERROR - 2014-03-20 20:27:16 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 20:27:35 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 20:37:29 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 20:38:37 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 20:39:33 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:53:05 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:53:28 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:53:28 --> exception 'Lynx_ErrorException' with message 'Cannot modify header information - headers already sent by (output started at C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php:18)' in C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php:675
Stack trace:
#0 [internal function]: _exception_handler(2, 'Cannot modify h...', 'C:\Users\ta\Doc...', 675, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(675): setcookie('lynx_sess', 'a:7:{s:10:"sess...', 1395334408, '/', '', false)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(258): CI_Session->_set_cookie()
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(474): CI_Session->sess_write()
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\models\Category.php(29): CI_Session->set_userdata('CATEGORY', Object(CategoryData))
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(20): Category->loadCategory()
#6 [internal function]: home->showHome()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-20 21:54:35 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:54:35 --> exception 'Lynx_ErrorException' with message 'Cannot modify header information - headers already sent by (output started at C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php:18)' in C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php:675
Stack trace:
#0 [internal function]: _exception_handler(2, 'Cannot modify h...', 'C:\Users\ta\Doc...', 675, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(675): setcookie('lynx_sess', 'a:7:{s:10:"sess...', 1395334475, '/', '', false)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(258): CI_Session->_set_cookie()
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\libraries\Session.php(474): CI_Session->sess_write()
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\models\Category.php(29): CI_Session->set_userdata('CATEGORY', Object(CategoryData))
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(20): Category->loadCategory()
#6 [internal function]: home->showHome()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-20 21:57:27 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:57:45 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:58:57 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 21:58:57 --> exception 'Exception' with message 'Data type not supported' in C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php:38
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php(44): ProductAttributeDomain->getTrueValue()
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(18): ProductAttributeDomain->__toString()
#2 [internal function]: home->showHome()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#6 {main}
ERROR - 2014-03-20 22:03:01 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:03:01 --> exception 'Exception' with message 'Data type not supported' in C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php:38
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php(44): ProductAttributeDomain->getTrueValue()
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(18): ProductAttributeDomain->__toString()
#2 [internal function]: home->showHome()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#6 {main}
ERROR - 2014-03-20 22:03:02 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:03:02 --> exception 'Exception' with message 'Data type not supported' in C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php:38
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php(44): ProductAttributeDomain->getTrueValue()
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(18): ProductAttributeDomain->__toString()
#2 [internal function]: home->showHome()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#6 {main}
ERROR - 2014-03-20 22:03:03 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:03:03 --> exception 'Exception' with message 'Data type not supported' in C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php:38
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\domains\ProductAttributeDomain.php(44): ProductAttributeDomain->getTrueValue()
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(18): ProductAttributeDomain->__toString()
#2 [internal function]: home->showHome()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(75): call_user_func_array(Array, Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#6 {main}
ERROR - 2014-03-20 22:03:13 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:03:38 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:04:08 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:04:40 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
ERROR - 2014-03-20 22:04:58 --> The session cookie data did not match what was expected. This could be a possible hacking attempt.
