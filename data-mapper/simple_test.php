<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'adodb5/adodb.inc.php';
require 'DB.php';
require 'Query.php';
require 'Domain.php';
require 'Mapper.php';
require 'Category_Domain.php';
require 'Category_Mapper.php';

$config = new DB_Config;
$config->debug = true;
$config->type = 'mysqli';

$config->host = 'localhost';
$config->user = 'root';
$config->password = 'root';
$config->database = 'eproject';

DB::config($config);
$db = DB::get_instance();
$a = new Category_Domain;



