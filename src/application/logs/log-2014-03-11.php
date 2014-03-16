<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-11 18:02:12 --> exception 'Lynx_ErrorException' with message 'simplexml_load_file() expects parameter 2 to be a class name derived from SimpleXMLElement, 'language' given' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLanguageProviders.php:17
Stack trace:
#0 [internal function]: _exception_handler(2, 'simplexml_load_...', 'E:\OTHER\Projec...', 17, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLanguageProviders.php(17): simplexml_load_file('../application/...', 'language', 'LIBXML_NOCDATA')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\MultilLanguageManager.php(83): DefaultLanguageProviders->loadResource()
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(150): MultilLanguageManager->loadResource()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(62): MY_Controller->init()
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(255): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-11 18:02:47 --> exception 'Lynx_ErrorException' with message 'simplexml_load_file() expects parameter 3 to be long, string given' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLanguageProviders.php:17
Stack trace:
#0 [internal function]: _exception_handler(2, 'simplexml_load_...', 'E:\OTHER\Projec...', 17, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLanguageProviders.php(17): simplexml_load_file('../application/...', 'SimpleXMLElemen...', 'LIBXML_NOCDATA')
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\MultilLanguageManager.php(83): DefaultLanguageProviders->loadResource()
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(150): MultilLanguageManager->loadResource()
#4 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(62): MY_Controller->init()
#5 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showhome', Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(255): require_once('E:\OTHER\Projec...')
#7 {main}
ERROR - 2014-03-11 18:06:49 --> exception 'Lynx_ErrorException' with message 'Array to string conversion' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLoadLanguage.php:31
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLoadLanguage.php(31): _exception_handler(8, 'Array to string...', 'E:\OTHER\Projec...', 31, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\MultilLanguageManager.php(103): DefaultLoadLanguage->getSupportedScreen('home', 'VN-VI', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(19): MultilLanguageManager->checkSupportScreen('home', 'VN-VI')
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->view('home')
#4 [internal function]: home->showHome()
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(66): call_user_func_array(Array, Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showhome', Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(255): require_once('E:\OTHER\Projec...')
#8 {main}
ERROR - 2014-03-11 18:07:30 --> exception 'Lynx_ErrorException' with message 'Trying to get property of non-object' in E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLoadLanguage.php:32
Stack trace:
#0 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\DefaultLoadLanguage.php(32): _exception_handler(8, 'Trying to get p...', 'E:\OTHER\Projec...', 32, Array)
#1 E:\OTHER\Project-e\TFS\ProjectE\src\application\libraries\multiLanguage\MultilLanguageManager.php(103): DefaultLoadLanguage->getSupportedScreen('home', 'VN-VI', Array)
#2 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Loader.php(19): MultilLanguageManager->checkSupportScreen('home', 'VN-VI')
#3 E:\OTHER\Project-e\TFS\ProjectE\src\application\controllers\home.php(8): MY_Loader->view('home')
#4 [internal function]: home->showHome()
#5 E:\OTHER\Project-e\TFS\ProjectE\src\application\core\MY_Controller.php(66): call_user_func_array(Array, Array)
#6 E:\OTHER\Project-e\TFS\ProjectE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showhome', Array)
#7 E:\OTHER\Project-e\TFS\ProjectE\src\docroot\index.php(255): require_once('E:\OTHER\Projec...')
#8 {main}
