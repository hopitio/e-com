<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-04-06 09:22:45 --> exception 'Lynx_ErrorException' with message 'Undefined variable: fields' in C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\FileMapper.php:44
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\FileMapper.php(44): _exception_handler(8, 'Undefined varia...', 'C:\Users\ta\Doc...', 44, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\domains\ProductAttributeDomain.php(41): FileMapper->find('1')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\views\product\details.php(13): ProductAttributeDomain->getTrueValue()
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(184): require_once('C:\Users\ta\Doc...')
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#5 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\product.php(16): OneColumnLayout->render('product/details')
#8 [internal function]: product->details('1')
#9 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(83): call_user_func_array(Array, Array)
#10 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#11 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#12 {main}
ERROR - 2014-04-06 09:40:24 --> exception 'Lynx_ErrorException' with message 'Undefined variable: id_or_code' in C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ListtypeMapper.php:31
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ListtypeMapper.php(31): _exception_handler(8, 'Undefined varia...', 'C:\Users\ta\Doc...', 31, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ListFixedMapperAbstract.php(11): ListtypeMapper->find('material', 'id')
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ListMaterialMapper.php(10): ListFixedMapperAbstract->__construct('material')
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\MapperAbstract.php(35): ListMaterialMapper->__construct()
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\home.php(12): MapperAbstract::make()
#5 [internal function]: home->showHome()
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(83): call_user_func_array(Array, Array)
#7 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('showhome', Array)
#8 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#9 {main}
ERROR - 2014-04-06 10:58:23 --> exception 'Lynx_ErrorException' with message 'Invalid argument supplied for foreach()' in C:\Users\ta\Documents\GitHub\e-com\src\application\helpers\ViewHelpers.php:32
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\helpers\ViewHelpers.php(32): _exception_handler(2, 'Invalid argumen...', 'C:\Users\ta\Doc...', 32, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\views\cart\shipping.php(70): ViewHelpers->options(false)
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\views\layout\one_colmun.php(184): require_once('C:\Users\ta\Doc...')
#3 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(833): include('C:\Users\ta\Doc...')
#4 C:\Users\ta\Documents\GitHub\e-com\src\system\core\Loader.php(419): CI_Loader->_ci_load(Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\layout\OneColumnLayout.php(24): CI_Loader->view('layout/one_colm...', Array)
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(27): OneColumnLayout->render('cart/shipping')
#7 [internal function]: cart->shipping()
#8 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(83): call_user_func_array(Array, Array)
#9 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('shipping', Array)
#10 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#11 {main}
