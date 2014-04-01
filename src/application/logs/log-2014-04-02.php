<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-04-02 00:03:06 --> exception 'Lynx_ErrorException' with message 'Missing argument 1 for product::details()' in C:\Users\AlexMax\Documents\GitHub\e-com\src\application\controllers\product.php:9
Stack trace:
#0 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\controllers\product.php(9): _exception_handler(2, 'Missing argumen...', 'C:\Users\AlexMa...', 9, Array)
#1 [internal function]: product->details()
#2 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\core\MY_Controller.php(82): call_user_func_array(Array, Array)
#3 C:\Users\AlexMax\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#4 C:\Users\AlexMax\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\AlexMa...')
#5 {main}
ERROR - 2014-04-02 00:03:21 --> exception 'Lynx_ErrorException' with message 'reset() expects parameter 1 to be array, boolean given' in C:\Users\AlexMax\Documents\GitHub\e-com\src\application\views\product\details.php:5
Stack trace:
#0 [internal function]: _exception_handler(2, 'reset() expects...', 'C:\Users\AlexMa...', 5, Array)
#1 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\views\product\details.php(5): reset(false)
#2 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(184): require_once('C:\Users\AlexMa...')
#3 C:\Users\AlexMax\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\AlexMa...')
#4 C:\Users\AlexMax\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#5 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#6 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\controllers\product.php(16): OneColumnLayout->render('product/details')
#7 [internal function]: product->details('category.html')
#8 C:\Users\AlexMax\Documents\GitHub\e-com\src\application\core\MY_Controller.php(82): call_user_func_array(Array, Array)
#9 C:\Users\AlexMax\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#10 C:\Users\AlexMax\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\AlexMa...')
#11 {main}
