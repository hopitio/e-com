<?php
defined("DS") or define("DS", DIRECTORY_SEPARATOR);
require_once BASEPATH . DS . "database" . DS . "Query.php";
require_once BASEPATH . DS . "core" . DS . "DomainInterface.php";
require_once BASEPATH . DS . "core" . DS . "MapperAbstract.php";

require_once APPPATH . "domains" . DS . "ListtypeDomain.php";
require_once APPPATH . "domains" . DS . "ListDomain.php";
require_once APPPATH . "domains" . DS . "ProductAttributeTypeDomain.php";
require_once APPPATH . "domains" . DS . "ProductAttributeDomain.php";
require_once APPPATH . "domains" . DS . "ProductDomain.php";
require_once APPPATH . "domains" . DS . "CategoryDomain.php";

require_once APPPATH . "mappers" . DS . "ListtypeMapper.php";
require_once APPPATH . "mappers" . DS . "ListMapper.php";
require_once APPPATH . "mappers" . DS . "ListFixedMapperAbstract.php";
require_once APPPATH . "mappers" . DS . "ListFixedMapperAbstract.php";
require_once APPPATH . "mappers" . DS . "ListMaterialMapper.php";
require_once APPPATH . "mappers" . DS . "ProductAttributeTypeMapper.php";
require_once APPPATH . "mappers" . DS . "ProductAttributeMapper.php";
require_once APPPATH . "mappers" . DS . "ProductMapper.php";
require_once APPPATH . "mappers" . DS . "CategoryMapper.php";