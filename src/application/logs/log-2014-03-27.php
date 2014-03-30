<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-27 21:44:44 --> exception 'Lynx_ErrorException' with message 'var_dump() [<a href='function.var-dump'>function.var-dump</a>]: Couldn't fetch mysqli_result' in C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php:18
Stack trace:
#0 [internal function]: _exception_handler(2, 'var_dump() [<a ...', 'C:\Users\ta\Doc...', 18, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(18): var_dump(Object(ADODB_mysqli))
#2 [internal function]: home->showHome()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showHome', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#6 {main}
ERROR - 2014-03-27 23:20:04 --> exception 'Exception' with message 'Data type not supported' in C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\domains\ProductAttributeDomain.php:44
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\product.php(14): ProductAttributeDomain->getTrueValue()
#1 [internal function]: product->details('1')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#5 {main}
ERROR - 2014-03-27 23:21:24 --> exception 'Lynx_ErrorException' with message 'Object of class FileMapper could not be converted to string' in C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\product.php:14
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\product.php(14): _exception_handler(4096, 'Object of class...', 'C:\Users\ta\Doc...', 14, Array)
#1 [internal function]: product->details('1')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#5 {main}
ERROR - 2014-03-27 23:35:18 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'product' does not have a method 'home'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:76
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 76, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('home', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-27 23:35:21 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'product' does not have a method 'home'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:76
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 76, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('home', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-27 23:59:56 --> exception 'Lynx_ErrorException' with message 'Missing argument 1 for ProductFixedDomain::getPrice(), called in C:\Users\ta\Documents\GitHub\e-com\src\application\views\product\details.php on line 29 and defined' in C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\domains\ProductFixedDomain.php:63
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\domains\ProductFixedDomain.php(63): _exception_handler(2, 'Missing argumen...', 'C:\Users\ta\Doc...', 63, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\product\details.php(29): ProductFixedDomain->getPrice()
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(167): require_once('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\product.php(16): OneColumnLayout->render('product/details')
#7 [internal function]: product->details('1')
#8 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(76): call_user_func_array(Array, Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#10 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#11 {main}
