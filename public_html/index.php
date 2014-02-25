<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', __DIR__ . DS);

require_once ROOT_DIR . 'Config.php';
require_once ROOT_DIR . 'Const.php';
require_once ROOT_DIR . 'App.php';

require_once App::get_libs_dir() . 'adodb5' . DS . 'adodb.inc.php';

require_once App::get_libs_dir() . 'cores' . DS . 'functions.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Request.php';

require_once App::get_libs_dir() . 'cores' . DS . 'DB.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Session.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Cookie.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Lang.php';

require_once App::get_libs_dir() . 'cores' . DS . 'Nav_item.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Model.php';
require_once App::get_libs_dir() . 'cores' . DS . 'View.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Controller.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Action.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Domain_Model.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Query.php';
require_once App::get_libs_dir() . 'domains' . DS . 'user_Domain.php';

require_once App::get_libs_dir() . 'cores' . DS . 'Front_controller.php';
require_once App::get_libs_dir() . 'cores' . DS . 'Bootstrap.php';

$bootstrap = new Bootstrap(isset($_GET['url']) ? $_GET['url'] : '');
