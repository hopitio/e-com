<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-03-30 08:45:44 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method 'product'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:77
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 77, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(77): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('product', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 10:24:46 --> exception 'LableKeyNotFound' with message 'Không tìm thấy key màn hình tương ứng 
    
    
    
    
    
    
    
    
->checkout_showCart' in C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\DefaultLoadLanguage.php:14
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\MultilLanguageManager.php(97): DefaultLoadLanguage->getScreen('checkout/showCa...', 'VN-VI', Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\multiLanguage\MultilLanguageManager.php(154): MultilLanguageManager->getLangViaScreen('checkout/showCa...', 'VN-VI')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(20): MultilLanguageManager->attachedLanguageDataToScreen('checkout/showCa...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\checkout.php(28): OneColumnLayout->render('checkout/showCa...')
#4 [internal function]: checkout->showCart()
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#6 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#8 {main}
ERROR - 2014-03-30 10:31:03 --> exception 'Lynx_ErrorException' with message 'Invalid argument supplied for foreach()' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php:6
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php(6): _exception_handler(2, 'Invalid argumen...', 'C:\Users\ta\Doc...', 6, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(181): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\checkout.php(28): OneColumnLayout->render('checkout/showCa...')
#6 [internal function]: checkout->showCart()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-30 10:31:52 --> exception 'Lynx_ErrorException' with message 'Invalid argument supplied for foreach()' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php:7
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php(7): _exception_handler(2, 'Invalid argumen...', 'C:\Users\ta\Doc...', 7, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(181): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\checkout.php(28): OneColumnLayout->render('checkout/showCa...')
#6 [internal function]: checkout->showCart()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-30 10:32:02 --> exception 'Lynx_ErrorException' with message 'Invalid argument supplied for foreach()' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php:6
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php(6): _exception_handler(2, 'Invalid argumen...', 'C:\Users\ta\Doc...', 6, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(181): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\checkout.php(28): OneColumnLayout->render('checkout/showCa...')
#6 [internal function]: checkout->showCart()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-30 16:08:07 --> exception 'Lynx_ErrorException' with message 'Object of class ProductAttributeDomain could not be converted to int' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php:17
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php(17): _exception_handler(8, 'Object of class...', 'C:\Users\ta\Doc...', 17, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(181): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(27): OneColumnLayout->render('checkout/showCa...')
#6 [internal function]: cart->showCart()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-30 16:08:29 --> exception 'Lynx_ErrorException' with message 'Object of class ProductAttributeDomain could not be converted to int' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php:17
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\checkout\showCart.php(17): _exception_handler(8, 'Object of class...', 'C:\Users\ta\Doc...', 17, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(181): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(27): OneColumnLayout->render('checkout/showCa...')
#6 [internal function]: cart->showCart()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
ERROR - 2014-03-30 16:22:41 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'cart' does not have a method 'angular.min.js'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('angular.min.js', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 16:22:49 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'cart' does not have a method 'angular.min.js'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('angular.min.js', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 16:31:33 --> exception 'Lynx_ErrorException' with message 'Undefined property: MY_Loader::$_angularApp' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php:2
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(2): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 2, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(31): OneColumnLayout->render('checkout/showCa...')
#5 [internal function]: cart->showCart()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-03-30 16:34:26 --> exception 'Lynx_ErrorException' with message 'Undefined property: MY_Loader::$_angularApp' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php:2
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(2): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 2, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(31): OneColumnLayout->render('checkout/showCa...')
#5 [internal function]: cart->showCart()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-03-30 16:34:29 --> exception 'Lynx_ErrorException' with message 'Undefined property: MY_Loader::$_angularApp' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php:2
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(2): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 2, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(31): OneColumnLayout->render('checkout/showCa...')
#5 [internal function]: cart->showCart()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-03-30 16:34:29 --> exception 'Lynx_ErrorException' with message 'Undefined property: MY_Loader::$_angularApp' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php:2
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(2): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 2, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(31): OneColumnLayout->render('checkout/showCa...')
#5 [internal function]: cart->showCart()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-03-30 16:34:38 --> exception 'Lynx_ErrorException' with message 'Undefined property: MY_Loader::$_angularApp' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php:2
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(2): _exception_handler(8, 'Undefined prope...', 'C:\Users\ta\Doc...', 2, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(31): OneColumnLayout->render('checkout/showCa...')
#5 [internal function]: cart->showCart()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showCart', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-03-30 17:09:40 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'account' does not have a method 'addToCart1'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('addToCart1', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 17:09:57 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'account' does not have a method 'addToCart1'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('addToCart1', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 17:59:04 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'cart' does not have a method 'checkout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('checkout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 18:57:58 --> exception 'Lynx_ErrorException' with message 'Undefined index: products' in C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php:50
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(50): _exception_handler(8, 'Undefined index...', 'C:\Users\ta\Doc...', 50, Array)
#1 [internal function]: cart->updateQuantityService()
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('updateQuantityS...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#5 {main}
ERROR - 2014-03-30 18:58:41 --> exception 'Lynx_ErrorException' with message 'Undefined index: products' in C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php:50
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(50): _exception_handler(8, 'Undefined index...', 'C:\Users\ta\Doc...', 50, Array)
#1 [internal function]: cart->updateQuantityService()
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('updateQuantityS...', Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#5 {main}
ERROR - 2014-03-30 21:19:19 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'login' does not have a method 'index'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('index', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 21:19:23 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'login' does not have a method 'images'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('images', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 21:43:25 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'cart' does not have a method 'checkout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('checkout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 21:43:33 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'cart' does not have a method 'checkout'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:81
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 81, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('checkout', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-03-30 22:44:22 --> exception 'Lynx_ErrorException' with message 'Undefined variable: cities' in C:\Users\ta\Documents\GitHub\e-com\src\application\views\cart\shipping.php:26
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\views\cart\shipping.php(26): _exception_handler(8, 'Undefined varia...', 'C:\Users\ta\Doc...', 26, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(184): require_once('C:\Users\ta\Doc...')
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(25): OneColumnLayout->render('cart/shipping')
#6 [internal function]: cart->shipping()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(81): call_user_func_array(Array, Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('shipping', Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#10 {main}
