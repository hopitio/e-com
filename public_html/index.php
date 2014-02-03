<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', __DIR__ . DS);

require ROOT_DIR . 'Config.php';
require ROOT_DIR . 'Const.php';
require ROOT_DIR . 'App.php';


require App::get_libs_dir() . 'cores' . DS . 'functions.php';
require App::get_libs_dir() . 'cores' . DS . 'Request.php';

require App::get_libs_dir() . 'adodb5' . DS . 'adodb.inc.php';
require App::get_libs_dir() . 'cores' . DS . 'DB.php';
require App::get_libs_dir() . 'cores' . DS . 'Session.php';

require App::get_libs_dir() . 'cores' . DS . 'Nav_item.php';
require App::get_libs_dir() . 'cores' . DS . 'Model.php';
require App::get_libs_dir() . 'cores' . DS . 'View.php';
require App::get_libs_dir() . 'cores' . DS . 'Controller.php';
require App::get_libs_dir() . 'cores' . DS . 'Action.php';
require App::get_libs_dir() . 'cores' . DS . 'Domain_Model.php';
require App::get_libs_dir() . 'cores' . DS . 'Query.php';

require App::get_libs_dir() . 'cores' . DS . 'Front_controller.php';
require App::get_libs_dir() . 'cores' . DS . 'Bootstrap.php';

$bootstrap = new Bootstrap(isset($_GET['url']) ? $_GET['url'] : '');
