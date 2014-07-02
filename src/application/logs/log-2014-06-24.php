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
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:11 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:36:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:11 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:36:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:11 --> Total execution time: 0.2031
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
INFO  - 2014-06-24 23:36:11 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:11 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:36:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:11 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:11 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:11 --> Total execution time: 0.2615
DEBUG - 2014-06-24 23:36:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:11 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:11 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:11 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:11 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:11 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:11 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:36:11 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:11 --> Total execution time: 0.2173
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:11 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:11 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:11 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:11 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:12 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:12 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:12 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:12 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:12 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:12 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:12 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:12 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:12 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:12 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:12 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:12 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:12 --> Config Class Initialized
INFO  - 2014-06-24 23:36:12 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:12 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:12 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:12 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:12 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:12 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:12 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Total execution time: 0.3278
DEBUG - 2014-06-24 23:36:12 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:12 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:12 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:12 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:12 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:12 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Model Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Model Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:12 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:12 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:12 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:12 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:12 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:12 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:12 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:12 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:13 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:13 --> Total execution time: 1.4229
DEBUG - 2014-06-24 23:36:13 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:13 --> Total execution time: 1.4533
DEBUG - 2014-06-24 23:36:13 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:13 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:13 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:13 --> Total execution time: 1.3916
DEBUG - 2014-06-24 23:36:13 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:13 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:13 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:13 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:13 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:13 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:13 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:13 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:13 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:13 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:13 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:13 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:36:13 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:13 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:13 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:13 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:13 --> Total execution time: 0.2253
DEBUG - 2014-06-24 23:36:40 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:40 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:40 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:40 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:36:40 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:40 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:40 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:40 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:40 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:40 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:40 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:40 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:40 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:40 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:36:40 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:40 --> Total execution time: 0.2143
DEBUG - 2014-06-24 23:36:40 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:40 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:40 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:40 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:40 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:40 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:40 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:41 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:41 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:41 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:36:41 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:41 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:41 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:41 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:41 --> Total execution time: 0.2351
DEBUG - 2014-06-24 23:36:41 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:41 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:41 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:41 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:41 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:41 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:41 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:41 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:41 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:41 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:41 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:41 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:41 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:41 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:41 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:41 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:41 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:41 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:41 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:41 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:41 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:41 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:41 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:41 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: url_helper
INFO  - 2014-06-24 23:36:41 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:41 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:41 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:41 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:41 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:41 --> Total execution time: 0.6189
DEBUG - 2014-06-24 23:36:41 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:41 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:41 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:41 --> Model Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Model Class Initialized
DEBUG - 2014-06-24 23:36:41 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:36:41 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:42 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:42 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:42 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:42 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:36:42 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:42 --> Total execution time: 1.4615
DEBUG - 2014-06-24 23:36:43 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:43 --> Total execution time: 1.5982
DEBUG - 2014-06-24 23:36:43 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:43 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Total execution time: 1.6438
DEBUG - 2014-06-24 23:36:43 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:43 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:43 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:43 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:43 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Config Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:36:43 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:36:43 --> URI Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Router Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Output Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Security Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Input Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:36:43 --> Language Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Loader Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:36:43 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:36:43 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Session Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:36:43 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Session routines successfully run
DEBUG - 2014-06-24 23:36:43 --> Controller Class Initialized
DEBUG - 2014-06-24 23:36:43 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:36:43 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:36:43 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:36:43 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:36:43 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:36:43 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:36:43 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:36:43 --> Final output sent to browser
DEBUG - 2014-06-24 23:36:43 --> Total execution time: 0.2671
DEBUG - 2014-06-24 23:37:22 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:22 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:22 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:22 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:22 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:22 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:22 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:22 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:22 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:22 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:22 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:23 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:23 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:23 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:23 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:37:23 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:23 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:23 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:23 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:23 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:23 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:23 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:23 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:37:23 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:23 --> Total execution time: 0.2288
DEBUG - 2014-06-24 23:37:23 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:23 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:23 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:23 --> Total execution time: 1.3424
DEBUG - 2014-06-24 23:37:23 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:23 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:23 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:23 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:23 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:23 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:23 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:24 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:37:24 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:37:24 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:37:24 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:37:24 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:24 --> Total execution time: 0.2492
DEBUG - 2014-06-24 23:37:24 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:24 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:24 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:24 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:24 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:24 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:24 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:24 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:24 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:24 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:24 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:24 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:24 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:24 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:24 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:24 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:24 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:24 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:37:24 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:37:24 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:37:24 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:37:24 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:24 --> Total execution time: 0.4200
DEBUG - 2014-06-24 23:37:24 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:24 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:24 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:24 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:24 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:24 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:24 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:24 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:24 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:24 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:37:24 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:24 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:24 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:24 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:24 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:24 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:25 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:25 --> Total execution time: 1.4335
DEBUG - 2014-06-24 23:37:25 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:25 --> Total execution time: 1.5270
DEBUG - 2014-06-24 23:37:25 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:25 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:25 --> Total execution time: 1.5628
DEBUG - 2014-06-24 23:37:25 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:25 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:25 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:25 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:26 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:26 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:26 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:26 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:26 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:26 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:26 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:26 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:26 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:26 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:26 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:26 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:26 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:26 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:26 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:26 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:37:26 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:37:26 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:37:26 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:37:26 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:26 --> Total execution time: 0.2732
DEBUG - 2014-06-24 23:37:31 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:31 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:31 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:31 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:31 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:31 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:31 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:31 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:31 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:31 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:31 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:31 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:31 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:32 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:32 --> Total execution time: 1.2595
DEBUG - 2014-06-24 23:37:56 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:56 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:56 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:56 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:56 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:56 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:56 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:56 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:56 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:56 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:56 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:56 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:57 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:37:57 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:57 --> Total execution time: 1.2495
DEBUG - 2014-06-24 23:37:57 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:57 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:57 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:57 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:57 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:57 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:57 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:57 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Output Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Security Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Input Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:57 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:37:57 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:57 --> Language Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:58 --> Loader Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:37:58 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Session Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:37:58 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:58 --> Session routines successfully run
DEBUG - 2014-06-24 23:37:58 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Controller Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:58 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:58 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:37:58 --> Model Class Initialized
DEBUG - 2014-06-24 23:37:58 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:37:58 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:37:59 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:59 --> Total execution time: 1.3931
DEBUG - 2014-06-24 23:37:59 --> Final output sent to browser
DEBUG - 2014-06-24 23:37:59 --> Total execution time: 1.4607
DEBUG - 2014-06-24 23:37:59 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Config Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:37:59 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:59 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:37:59 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:59 --> URI Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Router Class Initialized
DEBUG - 2014-06-24 23:37:59 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:00 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:00 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:00 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:38:00 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:00 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:00 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:01 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:01 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:01 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:01 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:38:01 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:01 --> Total execution time: 0.2472
DEBUG - 2014-06-24 23:38:01 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:01 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:01 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:01 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:01 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:01 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:01 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:01 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:01 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:01 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:01 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:01 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:01 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:01 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:01 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:01 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:01 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:01 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:01 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:38:01 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:38:01 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:38:01 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:01 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:01 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:01 --> Total execution time: 0.4383
DEBUG - 2014-06-24 23:38:01 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:01 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:01 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:01 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:01 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:01 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:01 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:01 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:01 --> Model Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:01 --> Model Class Initialized
DEBUG - 2014-06-24 23:38:01 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:01 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:01 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:02 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:02 --> Total execution time: 1.4187
DEBUG - 2014-06-24 23:38:02 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:02 --> Total execution time: 1.4298
DEBUG - 2014-06-24 23:38:02 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:02 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Total execution time: 1.4903
DEBUG - 2014-06-24 23:38:02 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:02 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:02 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:02 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:02 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:02 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:02 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:02 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:03 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:03 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:03 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:03 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:03 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:03 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:03 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:03 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:38:03 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:38:03 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:38:03 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:38:03 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:03 --> Total execution time: 0.2989
DEBUG - 2014-06-24 23:38:14 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:14 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:14 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:14 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:14 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:14 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:14 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:14 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:14 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:14 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:14 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:14 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:16 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:16 --> Total execution time: 1.2462
DEBUG - 2014-06-24 23:38:17 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:17 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:17 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:17 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:17 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:17 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:17 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:17 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:17 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:17 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:17 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:17 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:17 --> Model Class Initialized
DEBUG - 2014-06-24 23:38:18 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:38:18 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:18 --> Total execution time: 1.3073
DEBUG - 2014-06-24 23:38:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Output Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Security Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Input Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:18 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:38:18 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:18 --> Language Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Loader Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:38:19 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:19 --> Session Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:38:19 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:19 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Session routines successfully run
DEBUG - 2014-06-24 23:38:19 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:19 --> Controller Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:19 --> Model Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Model Class Initialized
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:19 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:38:19 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:38:19 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:38:20 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:20 --> Total execution time: 1.4416
DEBUG - 2014-06-24 23:38:20 --> Final output sent to browser
DEBUG - 2014-06-24 23:38:20 --> Total execution time: 1.4700
DEBUG - 2014-06-24 23:38:20 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Config Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:38:20 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:20 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:38:20 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:20 --> URI Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Router Class Initialized
DEBUG - 2014-06-24 23:38:20 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:46 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:46 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:46 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:46 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:46 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:46 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:40:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:47 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:40:47 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:40:47 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:47 --> Total execution time: 0.2568
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:47 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:40:48 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:40:48 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:40:48 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:40:48 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:48 --> Total execution time: 0.5490
DEBUG - 2014-06-24 23:40:48 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:48 --> Total execution time: 1.3100
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:48 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:48 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:48 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:48 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:48 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:48 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:48 --> Model Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Model Class Initialized
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:40:48 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:48 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:48 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:40:49 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:49 --> Total execution time: 1.6051
DEBUG - 2014-06-24 23:40:49 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:49 --> Total execution time: 1.6190
DEBUG - 2014-06-24 23:40:49 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:49 --> Total execution time: 1.6459
DEBUG - 2014-06-24 23:40:49 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:49 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:49 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:49 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:49 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:49 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:49 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:49 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:49 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:49 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:49 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:49 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:49 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:49 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:49 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:49 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:49 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:49 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:49 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:40:49 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:40:49 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:40:49 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:40:49 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:49 --> Total execution time: 0.2883
DEBUG - 2014-06-24 23:40:53 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:53 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:53 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:53 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:53 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:53 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:53 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:53 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:53 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:53 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:53 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:53 --> Helper loaded: form_helper
ERROR - 2014-06-24 23:40:54 --> exception 'Lynx_ErrorException' with message 'Undefined index: seller_name' in E:\OTHER\PROJECTE\src\application\controllers\product.php:25
Stack trace:
#0 E:\OTHER\PROJECTE\src\application\controllers\product.php(25): _exception_handler(8, 'Undefined index...', 'E:\OTHER\PROJEC...', 25, Array)
#1 [internal function]: product->{closure}(Array, Object(ProductFixedDomain))
#2 E:\OTHER\PROJECTE\src\application\libraries\MapperAbstract.php(149): call_user_func(Object(Closure), Array, Object(ProductFixedDomain))
#3 E:\OTHER\PROJECTE\src\application\ORM\mappers\ProductMapper.php(141): MapperAbstract->find(Object(Closure))
#4 E:\OTHER\PROJECTE\src\application\ORM\mappers\ProductFixedMapper.php(46): ProductMapper->find(Object(Closure))
#5 E:\OTHER\PROJECTE\src\application\controllers\product.php(26): ProductFixedMapper->find(Object(Closure))
#6 [internal function]: product->details('6')
#7 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#8 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('details', Array)
#9 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#10 {main}
DEBUG - 2014-06-24 23:40:54 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:40:54 --> File loaded: ../application/views/errors/common.php
DEBUG - 2014-06-24 23:40:54 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:54 --> Total execution time: 1.2975
DEBUG - 2014-06-24 23:40:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:55 --> Config Class Initialized
DEBUG - 2014-06-24 23:40:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:55 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:40:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:55 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:40:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:55 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:40:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:55 --> URI Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Router Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Output Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Security Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Input Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:40:56 --> Language Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Loader Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:40:56 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:40:56 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Session Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:40:56 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Session routines successfully run
DEBUG - 2014-06-24 23:40:56 --> Controller Class Initialized
DEBUG - 2014-06-24 23:40:56 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:40:56 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:40:56 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:40:56 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:40:56 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:40:56 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:40:56 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:40:56 --> Final output sent to browser
DEBUG - 2014-06-24 23:40:56 --> Total execution time: 0.4061
DEBUG - 2014-06-24 23:44:04 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:04 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:04 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:04 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:44:04 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:04 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:04 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:04 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:04 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:04 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:04 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:04 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:04 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:04 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:04 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:44:04 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:04 --> Total execution time: 0.2963
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:05 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:05 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:05 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:05 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:05 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:05 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:44:05 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:44:05 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:44:05 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:44:05 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:05 --> Total execution time: 0.2995
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:05 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:05 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:05 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:05 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:05 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:05 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:05 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:05 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:05 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:05 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:05 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:06 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:06 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:06 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:06 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:06 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:06 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:06 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:06 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:06 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:06 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:06 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:06 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/paymentConfig.php
INFO  - 2014-06-24 23:44:06 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:44:06 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:06 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:06 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:06 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:06 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:06 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Total execution time: 0.6413
DEBUG - 2014-06-24 23:44:06 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:06 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:06 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:06 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:07 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:07 --> Total execution time: 1.5222
DEBUG - 2014-06-24 23:44:07 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:07 --> Total execution time: 1.5707
DEBUG - 2014-06-24 23:44:07 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:07 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:07 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:07 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:07 --> Total execution time: 1.6102
DEBUG - 2014-06-24 23:44:07 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:07 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:07 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:07 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:07 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:07 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:07 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:07 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:07 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:07 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:07 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:07 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:07 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:44:07 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:44:07 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:44:07 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:44:07 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:07 --> Total execution time: 0.2978
DEBUG - 2014-06-24 23:44:15 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:15 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:15 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:15 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:15 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:15 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:15 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:15 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:15 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:15 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:15 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:15 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:16 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:16 --> Total execution time: 1.2814
DEBUG - 2014-06-24 23:44:17 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:17 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:17 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:17 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:17 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:17 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:17 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:17 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:17 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:17 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:17 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:17 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:17 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:18 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:44:18 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:18 --> Total execution time: 1.3036
DEBUG - 2014-06-24 23:44:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:18 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:18 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:18 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:18 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:18 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:19 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:19 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:19 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:19 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:19 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:19 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:19 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:19 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:20 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:20 --> Total execution time: 1.4053
DEBUG - 2014-06-24 23:44:20 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:20 --> Total execution time: 1.4306
DEBUG - 2014-06-24 23:44:20 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:20 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:20 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:20 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:20 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:20 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:20 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:20 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:20 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:20 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:20 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:20 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:20 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:21 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:21 --> File loaded: ../application/views/layout/portal_one_column.php
DEBUG - 2014-06-24 23:44:21 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:21 --> Total execution time: 0.3074
DEBUG - 2014-06-24 23:44:21 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:21 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:21 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:21 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:21 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:21 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:21 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:21 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:21 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:21 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:22 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:22 --> Total execution time: 1.3749
DEBUG - 2014-06-24 23:44:23 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:23 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:23 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:23 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:23 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:23 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:23 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:23 --> File loaded: ../application/views/layout/portal_one_column.php
DEBUG - 2014-06-24 23:44:23 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:23 --> Total execution time: 0.2847
DEBUG - 2014-06-24 23:44:23 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:23 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:23 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:23 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:23 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:23 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:23 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:23 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:23 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:23 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:23 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:23 --> Total execution time: 0.3969
DEBUG - 2014-06-24 23:44:26 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:26 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:26 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:26 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:26 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:26 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:26 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:26 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:26 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:26 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:26 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:26 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:26 --> File loaded: ../application/views/layout/portal_one_column.php
DEBUG - 2014-06-24 23:44:26 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:26 --> Total execution time: 0.3041
DEBUG - 2014-06-24 23:44:27 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:27 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:27 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:27 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:27 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:27 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:27 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:27 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:27 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:27 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:27 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:27 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:27 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:27 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:27 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:27 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:27 --> Total execution time: 0.3880
DEBUG - 2014-06-24 23:44:27 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:27 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:27 --> Total execution time: 0.4202
DEBUG - 2014-06-24 23:44:31 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:31 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:31 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:31 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:31 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:31 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:31 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:31 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:31 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:31 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:31 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:31 --> File loaded: ../application/views/layout/portal_one_column.php
DEBUG - 2014-06-24 23:44:31 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:31 --> Total execution time: 0.2994
DEBUG - 2014-06-24 23:44:31 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:31 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:31 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:31 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:32 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:32 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:32 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:32 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:32 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:32 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:32 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:32 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:33 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:33 --> Total execution time: 1.3449
DEBUG - 2014-06-24 23:44:44 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:44 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:44 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:44 --> No URI present. Default controller set.
DEBUG - 2014-06-24 23:44:44 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:44 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:44 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:44 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:45 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:45 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:45 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:45 --> File loaded: ../application/views/layout/one_colmun.php
DEBUG - 2014-06-24 23:44:45 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:45 --> Total execution time: 0.3022
DEBUG - 2014-06-24 23:44:45 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:45 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:45 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:45 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:45 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:45 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:45 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:45 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:45 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:45 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:45 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:45 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:45 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:45 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:45 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:45 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:45 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:45 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:45 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:45 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:45 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:45 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:45 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:45 --> Database Driver Class Initialized
INFO  - 2014-06-24 23:44:45 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:44:45 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:44:45 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:45 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:44:45 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:45 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:45 --> Total execution time: 0.5326
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:45 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:45 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:45 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:45 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:45 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:45 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:45 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:45 --> Model Class Initialized
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:45 --> Cache class already loaded. Second attempt ignored.
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:45 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:45 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:46 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:46 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:46 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:46 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:46 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:46 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:46 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:46 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:46 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:46 --> Helper loaded: form_helper
DEBUG - 2014-06-24 23:44:46 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:46 --> Total execution time: 1.5362
DEBUG - 2014-06-24 23:44:46 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:46 --> Total execution time: 1.5582
DEBUG - 2014-06-24 23:44:46 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:46 --> Total execution time: 1.5819
DEBUG - 2014-06-24 23:44:46 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:46 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Output Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Config Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Hooks Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Security Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Utf8 Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Input Class Initialized
DEBUG - 2014-06-24 23:44:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:47 --> UTF-8 Support Enabled
DEBUG - 2014-06-24 23:44:47 --> Global POST and COOKIE data sanitized
DEBUG - 2014-06-24 23:44:47 --> Language Class Initialized
DEBUG - 2014-06-24 23:44:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:47 --> URI Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Router Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Loader Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Helper loaded: url_helper
DEBUG - 2014-06-24 23:44:47 --> Helper loaded: inflector_helper
DEBUG - 2014-06-24 23:44:47 --> Database Driver Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Session Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Helper loaded: string_helper
DEBUG - 2014-06-24 23:44:47 --> Encrypt Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Session routines successfully run
DEBUG - 2014-06-24 23:44:47 --> Controller Class Initialized
DEBUG - 2014-06-24 23:44:47 --> Config file loaded: ../application/config/development/paymentConfig.php
DEBUG - 2014-06-24 23:44:47 --> Config file loaded: ../application/config/development/mailler.php
DEBUG - 2014-06-24 23:44:47 --> Config file loaded: ../application/config/development/maintenance.php
DEBUG - 2014-06-24 23:44:47 --> Helper loaded: form_helper
INFO  - 2014-06-24 23:44:47 --> exception 'Lynx_RoutingException' with message 'LỖI HỆ THỐNG' in E:\OTHER\PROJECTE\src\application\controllers\error.php:6
Stack trace:
#0 [internal function]: Error->notFound()
#1 E:\OTHER\PROJECTE\src\application\core\MY_Controller.php(101): call_user_func_array(Array, Array)
#2 E:\OTHER\PROJECTE\src\system\core\CodeIgniter.php(325): MY_Controller->_remap('notFound', Array)
#3 E:\OTHER\PROJECTE\src\docroot\index.php(258): require_once('E:\OTHER\PROJEC...')
#4 {main}
DEBUG - 2014-06-24 23:44:47 --> File loaded: ../application/views/extra_footer.php
DEBUG - 2014-06-24 23:44:47 --> File loaded: ../application/views/errors/common_with_details.php
DEBUG - 2014-06-24 23:44:47 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:47 --> Total execution time: 0.3575
DEBUG - 2014-06-24 23:44:47 --> Final output sent to browser
DEBUG - 2014-06-24 23:44:47 --> Total execution time: 1.3268
