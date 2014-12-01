<?php

defined("DS") or define("DS", DIRECTORY_SEPARATOR);
require_once APPPATH . 'libraries' . DS . 'caculation' . DS . 'caculation.ini.php';

require_once APPPATH . "ORM" . DS . "database" . DS . "DB.php";
require_once APPPATH . "ORM" . DS . "database" . DS . "Query.php";

require_once __DIR__ . DS . "DomainInterface.php";
require_once __DIR__ . DS . "MapperAbstract.php";

require_once APPPATH . "libraries" . DS . "DataTableHelper.php";

spl_autoload_register(function($class)
{
    if (strpos($class, 'Domain') !== false)
    {
        include_once APPPATH . "libraries" . DS . "domains" . DS . "$class.php";
    }
    else if (strpos($class, 'Mapper') !== false)
    {
        include_once APPPATH . "ORM" . DS . "mappers" . DS . "$class.php";
    }
});

$portalConfig = new DBConfig;
$portalConfig->type = 'mysqli';
$portalConfig->host = 'localhost';
$portalConfig->user = 'root';
$portalConfig->password = 'root';
$portalConfig->database = 'portal';
DB::config('portal', $portalConfig);

$mainConfig = new DBConfig;
$mainConfig->type = 'mysqli';
$mainConfig->host = 'localhost';
$mainConfig->user = 'root';
$mainConfig->password = 'root';
$mainConfig->database = 'eproject';
DB::config(DB::DEFAULT_INSTANCE, $mainConfig);
