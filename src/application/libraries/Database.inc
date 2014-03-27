<?php

defined("DS") or define("DS", DIRECTORY_SEPARATOR);

require_once APPPATH . "ORM" . DS . "database" . DS . "DB.php";

require_once APPPATH . "ORM" . DS . "database" . DS . "Query.php";
require_once __DIR__ . DS . "DomainInterface.php";
require_once __DIR__ . DS . "MapperAbstract.php";

require_once APPPATH . "libraries" . DS . "domains" . DS . "ListtypeDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "ListDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "ProductAttributeTypeDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "ProductAttributeDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "ProductDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "ProductFixedDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "FeatureProductDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "CategoryDomain.php";
require_once APPPATH . "libraries" . DS . "domains" . DS . "FileDomain.php";

require_once APPPATH . "ORM" . DS . "mappers" . DS . "ListtypeMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ListMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ListFixedMapperAbstract.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ListFixedMapperAbstract.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ListMaterialMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ProductAttributeTypeMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ProductAttributeMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ProductMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "ProductFixedMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "FeatureProductMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "CategoryMapper.php";
require_once APPPATH . "ORM" . DS . "mappers" . DS . "FileMapper.php";

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
