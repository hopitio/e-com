ERROR - 2014-04-27 19:19:06 --> exception 'ADODB_Exception' with message 'mysqli error: [1064: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '* FROM t_tax tax
INNER JOIN t_tax_language tl ON tax.id = tl.fk_tax AND tl.langu' at line 1] in EXECUTE("SELECT *,* FROM t_tax tax
INNER JOIN t_tax_language tl ON tax.id = tl.fk_tax AND tl.language='VN-VI'
    INNER JOIN t_product_tax pt ON pt.fk_tax = tax.id AND pt.fk_product=1")
' in C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb-exceptions.inc.php:78
Stack trace:
#0 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1074): adodb_throw('mysqli', 'EXECUTE', 1064, 'You have an err...', Object(Query), false, Object(ADODB_mysqli))
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1049): ADOConnection->_Execute(Object(Query), false)
#2 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1580): ADOConnection->Execute(Object(Query), Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1417): ADOConnection->GetArray(Object(Query), Array)
#4 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\MapperAbstract.php(116): ADOConnection->GetAll(Object(Query), Array)
#5 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\TaxMapper.php(58): MapperAbstract->findAll(NULL)
#6 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ProductMapper.php(140): TaxMapper->findAll()
#7 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ProductMapper.php(103): ProductMapper->loadTaxes(Object(CartDomain))
#8 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\MapperAbstract.php(81): ProductMapper->makeDomainCallback(Object(CartDomain))
#9 C:\Users\ta\Documents\GitHub\e-com\src\application\libraries\MapperAbstract.php(124): MapperAbstract->makeDomain(Array)
#10 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ProductMapper.php(114): MapperAbstract->findAll('*')
#11 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\ProductFixedMapper.php(31): ProductMapper->findAll('*')
#12 C:\Users\ta\Documents\GitHub\e-com\src\application\ORM\mappers\CartMapper.php(87): ProductFixedMapper->findAll('*')
#13 C:\Users\ta\Documents\GitHub\e-com\src\application\controllers\cart.php(51): CartMapper->findAll()
#14 [internal function]: cart->cartProductsService()
#15 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#16 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('cartProductsSer...', Array)
#17 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#18 {main}
ERROR - 2014-04-27 19:30:42 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:31:04 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:31:04 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:08 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:09 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:20 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:21 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:58 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:32:58 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:35:05 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:35:05 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:35:16 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:35:17 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:35:59 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:36:00 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:37:51 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:37:51 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:38:02 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:38:02 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:01 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:01 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:02 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:42:26 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:43:16 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:43:16 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:43:16 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:43:17 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:15 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:15 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:16 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:17 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:59 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:59 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:44:59 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:45:00 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:46:32 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:46:32 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:46:33 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:46:36 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:47:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:47:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:47:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:47:24 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:48:49 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:48:49 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:48:49 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:08 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:08 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:08 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:09 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:54 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:54 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:54 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
ERROR - 2014-04-27 19:49:54 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'home' does not have a method '%7B%7Bsection.displayImage%7D%7D'' in C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php:84
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta\Doc...', 84, Array)
#1 C:\Users\ta\Documents\GitHub\e-com\src\application\core\MY_Controller.php(84): call_user_func_array(Array, Array)
#2 C:\Users\ta\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bsection.d...', Array)
#3 C:\Users\ta\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta\Doc...')
#4 {main}
