<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-15 00:29:31 --> exception 'Lynx_ErrorException' with message 'data bắt buộc phải là array' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:54
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(16): AbstractLayout->attachedView('home', Object(SimpleXMLElement))
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(40): OneColumnLayout->render('home', Object(SimpleXMLElement))
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 00:37:44 --> exception 'Lynx_ErrorException' with message 'Undefined variable: home' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(8, 'Undefined varia...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(17): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(36): OneColumnLayout->render('home', Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#6 [internal function]: home->showHome()
#7 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#10 {main}
ERROR - 2014-03-15 00:38:02 --> exception 'Lynx_ErrorException' with message 'Trying to get property of non-object' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(8, 'Trying to get p...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(17): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(36): OneColumnLayout->render('home', Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#6 [internal function]: home->showHome()
#7 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#10 {main}
ERROR - 2014-03-15 01:02:30 --> exception 'Lynx_ErrorException' with message 'Illegal offset type' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(2, 'Illegal offset ...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(20): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#5 [internal function]: home->showHome()
#6 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#9 {main}
ERROR - 2014-03-15 01:03:30 --> exception 'Lynx_ErrorException' with message 'Creating default object from empty value' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:50
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(50): _exception_handler(2, 'Creating defaul...', 'E:\OTHER\Projec...', 50, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:03:51 --> exception 'Lynx_ErrorException' with message 'Attempt to assign property of non-object' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:51
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(51): _exception_handler(2, 'Attempt to assi...', 'E:\OTHER\Projec...', 51, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:04:08 --> exception 'Lynx_ErrorException' with message 'Creating default object from empty value' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:51
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(51): _exception_handler(2, 'Creating defaul...', 'E:\OTHER\Projec...', 51, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:05:17 --> exception 'Lynx_ErrorException' with message 'Attempt to assign property of non-object' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:51
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(51): _exception_handler(2, 'Attempt to assi...', 'E:\OTHER\Projec...', 51, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:06:14 --> exception 'Lynx_ErrorException' with message 'Undefined variable: item' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:51
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(51): _exception_handler(8, 'Undefined varia...', 'E:\OTHER\Projec...', 51, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:06:40 --> exception 'Lynx_ErrorException' with message 'Creating default object from empty value' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:50
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(50): _exception_handler(2, 'Creating defaul...', 'E:\OTHER\Projec...', 50, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:08:24 --> exception 'Lynx_ErrorException' with message 'Attempt to assign property of non-object' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php:51
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\AbstractLayout.php(51): _exception_handler(2, 'Attempt to assi...', 'E:\OTHER\Projec...', 51, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(19): AbstractLayout->attachedView('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-15 01:10:10 --> exception 'Lynx_ErrorException' with message 'Illegal offset type' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(2, 'Illegal offset ...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(20): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#5 [internal function]: home->showHome()
#6 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#9 {main}
ERROR - 2014-03-15 01:11:11 --> exception 'Lynx_ErrorException' with message 'Illegal offset type' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(2, 'Illegal offset ...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(20): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#5 [internal function]: home->showHome()
#6 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#9 {main}
ERROR - 2014-03-15 01:11:39 --> exception 'Lynx_ErrorException' with message 'Illegal offset type' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(2, 'Illegal offset ...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(20): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#5 [internal function]: home->showHome()
#6 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#9 {main}
ERROR - 2014-03-15 01:11:42 --> exception 'Lynx_ErrorException' with message 'Illegal offset type' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:6
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(6): _exception_handler(2, 'Illegal offset ...', 'E:\OTHER\Projec...', 6, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(20): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): OneColumnLayout->render('home')
#5 [internal function]: home->showHome()
#6 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#9 {main}
