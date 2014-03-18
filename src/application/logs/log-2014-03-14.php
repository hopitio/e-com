<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-14 23:52:47 --> exception 'Lynx_ErrorException' with message 'Undefined variable: dataHeader' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php:16
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(16): _exception_handler(8, 'Undefined varia...', 'E:\OTHER\Projec...', 16, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(50): OneColumnLayout->render('home', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#3 [internal function]: home->showHome()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-14 23:53:23 --> exception 'Lynx_ErrorException' with message 'Undefined variable: view' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:10
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(10): _exception_handler(8, 'Undefined varia...', 'E:\OTHER\Projec...', 10, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(17): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(50): OneColumnLayout->render('home', Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#6 [internal function]: home->showHome()
#7 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#10 {main}
ERROR - 2014-03-14 23:53:48 --> exception 'Lynx_ErrorException' with message 'Undefined variable: view' in E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php:10
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\views\layout\one_colmun.php(10): _exception_handler(8, 'Undefined varia...', 'E:\OTHER\Projec...', 10, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(845): include('E:\OTHER\Projec...')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\Loader.php(431): CI_Loader->_ci_load(Array)
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\layout\OneColumnLayout.php(18): CI_Loader->view('layout/one_colm...', Array)
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(50): OneColumnLayout->render('home', Array)
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->initalView('home', 'TEMP_ONE_COL')
#6 [internal function]: home->showHome()
#7 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(72): call_user_func_array(Array, Array)
#8 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(323): MY_Controller->_remap('showhome', Array)
#9 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(258): require_once('E:\OTHER\Projec...')
#10 {main}
