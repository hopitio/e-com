<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-04-20 09:32:12 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'seller' does not have a method 'layout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('layout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-20 09:32:20 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'seller' does not have a method 'layout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('layout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-20 09:32:37 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'seller' does not have a method 'layout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('layout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-20 09:32:45 --> exception 'LableKeyNotFound' with message 'Không tìm thấy key màn hình tương ứng 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
->seller_show_products' in C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\DefaultLoadLanguage.php:14
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\MultilLanguageManager.php(97): DefaultLoadLanguage->getScreen('seller/show_pro...', 'VN-VI', Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\MultilLanguageManager.php(154): MultilLanguageManager->getLangViaScreen('seller/show_pro...', 'VN-VI')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\SellerLayout.php(18): MultilLanguageManager->attachedLanguageDataToScreen('seller/show_pro...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\seller.php(23): SellerLayout->render('seller/show_pro...')
#4 [internal function]: seller->show_products()
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#6 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('show_products', Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#8 {main}
ERROR - 2014-04-20 09:33:14 --> exception 'Lynx_ErrorException' with message 'Undefined variable: user' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\seller.php:63
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\seller.php(63): _exception_handler(8, 'Undefined varia...', 'C:\Users\ta\Doc...', 63, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\SellerLayout.php(21): CI_Loader->view('layout/seller', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\seller.php(23): SellerLayout->render('seller/show_pro...')
#5 [internal function]: seller->show_products()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('show_products', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-04-20 09:34:36 --> exception 'Lynx_ErrorException' with message 'Undefined variable: user' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\seller.php:63
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\seller.php(63): _exception_handler(8, 'Undefined varia...', 'C:\Users\ta\Doc...', 63, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\SellerLayout.php(21): CI_Loader->view('layout/seller', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\seller.php(23): SellerLayout->render('seller/show_pro...')
#5 [internal function]: seller->show_products()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('show_products', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
