DEBUG - 2014-06-24 23:02:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:02:46 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:02:46 --> URI Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Router Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Output Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Security Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Input Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:02:46 --> Language Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Loader Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:02:46 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:02:46 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Session Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:02:46 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Session routines successfully run
DEBUG - 2014-06-24 23:02:46 --> Controller Class Initialized
DEBUG - 2014-06-24 23:02:46 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:02:46 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:02:46 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:02:46 --> Helper loaded: form_helper
ERROR - 2014-06-24 23:02:46 --> exception 'ADODB_Exception' with message 'mysqli error: [1248: Every derived table must have its own alias] in EXECUTE("SELECT COUNT(DISTINCT p.id) FROM (SELECT p.id FROM t_product p
INNER JOIN t_seller seller ON p.fk_seller=seller.id
    INNER JOIN t_product_attribute sname ON sname.fk_product = p.id AND sname.fk_attribute_type = 1 AND value_varchar LIKE '%s%'
WHERE p.`status`=1 UNION SELECT p.id FROM t_product p
INNER JOIN t_seller seller ON p.fk_seller=seller.id
WHERE p.`status`=1
    AND seller.name LIKE '%s%')")
' in C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb-exceptions.inc.php:78
Stack trace:
#0 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1074): adodb_throw('mysqli', 'EXECUTE', 1248, 'Every derived t...', 'SELECT COUNT(DI...', false, Object(ADODB_mysqli))
#1 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\ORM\database\adodb5\adodb.inc.php(1030): ADOConnection->_Execute('SELECT COUNT(DI...')
#2 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\ORM\database\adodb5\drivers\adodb-mysqli.inc.php(153): ADOConnection->Execute('SELECT COUNT(DI...', Array)
#3 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\ORM\mappers\SearchMapper.php(55): ADODB_mysqli->GetOne('SELECT COUNT(DI...', Array)
#4 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\controllers\search.php(47): SearchMapper->count()
#5 [internal function]: search->getProductService()
#6 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#7 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('getProductServi...', Array)
#8 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta.del...')
#9 {main}
DEBUG - 2014-06-24 23:02:46 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:02:46 --> File loaded: ../application/views/errors/common.php
DEBUG - 2014-06-24 23:02:46 --> Final output sent to browser
DEBUG - 2014-06-24 23:02:46 --> Total execution time: 0.2341
DEBUG - 2014-06-24 23:03:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:03:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:03:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Router Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Output Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Security Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Input Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:03:55 --> Language Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Loader Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:03:55 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:03:55 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Session Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:03:55 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Session routines successfully run
DEBUG - 2014-06-24 23:03:55 --> Controller Class Initialized
DEBUG - 2014-06-24 23:03:55 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:03:55 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:03:55 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:03:55 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:03:55 --> Final output sent to browser
DEBUG - 2014-06-24 23:03:55 --> Total execution time: 0.1260
DEBUG - 2014-06-24 23:04:09 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:09 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:09 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Output Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Security Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Input Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:04:09 --> Language Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Loader Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:04:09 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Session Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:04:09 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Session routines successfully run
DEBUG - 2014-06-24 23:04:09 --> Controller Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:04:09 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:04:09 --> Final output sent to browser
DEBUG - 2014-06-24 23:04:09 --> Total execution time: 0.1854
DEBUG - 2014-06-24 23:04:09 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:09 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:09 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:09 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:09 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:09 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:09 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Output Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Security Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Input Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:04:09 --> Language Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Loader Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:04:09 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Session Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:04:09 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Session routines successfully run
DEBUG - 2014-06-24 23:04:09 --> Controller Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:04:09 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:04:09 --> Helper loaded: form_helper
ERROR - 2014-06-24 23:04:09 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'search' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php:101
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta.del...', 101, Array)
#1 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta.del...')
#4 {main}
DEBUG - 2014-06-24 23:04:09 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:04:09 --> File loaded: ../application/views/errors/common.php
DEBUG - 2014-06-24 23:04:09 --> Final output sent to browser
DEBUG - 2014-06-24 23:04:09 --> Total execution time: 0.1490
DEBUG - 2014-06-24 23:04:09 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:09 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:09 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:09 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:10 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:10 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:10 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:10 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Output Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Output Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Security Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Security Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Input Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Input Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:04:10 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:04:10 --> Language Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Language Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Loader Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Loader Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:04:10 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Session Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Session Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:04:10 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Session routines successfully run
DEBUG - 2014-06-24 23:04:10 --> Session routines successfully run
DEBUG - 2014-06-24 23:04:10 --> Controller Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Controller Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Model Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:04:10 --> Model Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:04:10 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:04:10 --> Final output sent to browser
DEBUG - 2014-06-24 23:04:10 --> Total execution time: 0.1951
DEBUG - 2014-06-24 23:04:10 --> Final output sent to browser
DEBUG - 2014-06-24 23:04:10 --> Total execution time: 0.2101
DEBUG - 2014-06-24 23:04:10 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:10 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:10 --> Config Class Initialized
DEBUG - 2014-06-24 23:04:10 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:10 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:04:10 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:04:10 --> Output Class Initialized
DEBUG - 2014-06-24 23:04:10 --> URI Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Security Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Router Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Input Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:04:10 --> Language Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Loader Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:04:10 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Session Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:04:10 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Session routines successfully run
DEBUG - 2014-06-24 23:04:10 --> Controller Class Initialized
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:04:10 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:04:10 --> Helper loaded: form_helper
ERROR - 2014-06-24 23:04:10 --> exception 'Lynx_ErrorException' with message 'call_user_func_array() expects parameter 1 to be a valid callback, class 'search' does not have a method '%7B%7Bproduct.thumbnail%7D%7D'' in C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php:101
Stack trace:
#0 [internal function]: _exception_handler(2, 'call_user_func_...', 'C:\Users\ta.del...', 101, Array)
#1 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('%7B%7Bproduct.t...', Array)
#3 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta.del...')
#4 {main}
DEBUG - 2014-06-24 23:04:10 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:04:10 --> File loaded: ../application/views/errors/common.php
DEBUG - 2014-06-24 23:04:10 --> Final output sent to browser
DEBUG - 2014-06-24 23:04:10 --> Total execution time: 0.2398
DEBUG - 2014-06-24 23:09:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:46 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:46 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:46 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:46 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:46 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:46 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:46 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:46 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:46 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:46 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:46 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:09:46 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:46 --> Total execution time: 0.1366
DEBUG - 2014-06-24 23:09:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:46 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:46 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:46 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:47 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:47 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:47 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Model Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:47 --> Model Class Initialized
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:47 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:47 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:47 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:47 --> Total execution time: 0.2304
DEBUG - 2014-06-24 23:09:47 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:47 --> Total execution time: 0.2330
DEBUG - 2014-06-24 23:09:48 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:48 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:48 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:48 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:48 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:48 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:48 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:48 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:48 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:48 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:48 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:48 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:52 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:52 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:52 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:52 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:52 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:52 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:52 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:52 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:52 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:52 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:52 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:52 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:52 --> Total execution time: 0.1305
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:09:54 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:54 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:54 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:54 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:54 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:54 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:09:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:54 --> Total execution time: 0.1377
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:54 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:54 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:54 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:54 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
INFO  - 2014-06-24 23:09:54 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta.del...')
#4 {main}
DEBUG - 2014-06-24 23:09:54 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:54 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:09:54 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:54 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:09:54 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:54 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:54 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:54 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:54 --> Total execution time: 0.3249
DEBUG - 2014-06-24 23:09:54 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:54 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:54 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:54 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:54 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:54 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Model Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:54 --> Model Class Initialized
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:54 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:54 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:54 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:54 --> Total execution time: 0.4610
DEBUG - 2014-06-24 23:09:54 --> Total execution time: 0.4617
DEBUG - 2014-06-24 23:09:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:55 --> Total execution time: 0.4974
DEBUG - 2014-06-24 23:09:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:55 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:55 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:55 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:55 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:55 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:55 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:55 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:55 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:09:55 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 C:\Users\ta.dell-vostro\Documents\GitHub\e-com\src\docroot\index.php(258): require_once('C:\Users\ta.del...')
#4 {main}
DEBUG - 2014-06-24 23:09:55 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:09:55 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:09:55 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:55 --> Total execution time: 0.2904
DEBUG - 2014-06-24 23:09:59 --> Config Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:09:59 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:09:59 --> URI Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Router Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Output Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Security Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Input Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:09:59 --> Language Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Loader Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:09:59 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:09:59 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Session Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:09:59 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Session routines successfully run
DEBUG - 2014-06-24 23:09:59 --> Controller Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:09:59 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:09:59 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:09:59 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:09:59 --> Model Class Initialized
DEBUG - 2014-06-24 23:09:59 --> Final output sent to browser
DEBUG - 2014-06-24 23:09:59 --> Total execution time: 0.1891
DEBUG - 2014-06-24 23:10:02 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:02 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:03 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:03 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Output Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Security Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Input Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:10:03 --> Language Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Loader Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:10:03 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:10:03 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Session Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:10:03 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Session routines successfully run
DEBUG - 2014-06-24 23:10:03 --> Controller Class Initialized
DEBUG - 2014-06-24 23:10:03 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:10:03 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:10:03 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:10:03 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:10:03 --> Final output sent to browser
DEBUG - 2014-06-24 23:10:03 --> Total execution time: 0.1688
DEBUG - 2014-06-24 23:10:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:10:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:10:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:10:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:10:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Model Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:10:11 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:10:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:10:11 --> Total execution time: 0.1607
DEBUG - 2014-06-24 23:10:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:10:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:10:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:10:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:10:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:10:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:10:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:10:11 --> Model Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Model Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Model Class Initialized
DEBUG - 2014-06-24 23:10:11 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:10:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:10:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:10:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:10:11 --> Total execution time: 0.3244
DEBUG - 2014-06-24 23:10:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:10:11 --> Total execution time: 0.3479
DEBUG - 2014-06-24 23:10:12 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:12 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:12 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:12 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:12 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:12 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Config Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:10:15 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:10:15 --> URI Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Router Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Output Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Security Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Input Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:10:15 --> Language Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Loader Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:10:15 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:10:15 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Session Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:10:15 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Session routines successfully run
DEBUG - 2014-06-24 23:10:15 --> Controller Class Initialized
DEBUG - 2014-06-24 23:10:15 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:10:15 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:10:15 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:10:15 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:10:15 --> Final output sent to browser
DEBUG - 2014-06-24 23:10:15 --> Total execution time: 0.2323
