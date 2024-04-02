<?php

set_include_path("./src");


require_once("model/PlaceStorageMySQL.php");
require_once("model/PlaceStorage.php");
require_once("model/PlaceStorageFile.php");
require_once("model/Place.php");
require_once("model/AccountStorageMySQL.php");
require_once("model/AccountStorageStub.php");
require_once("lib/ObjectFileDB.php");
require_once("Router.php");
require_once('mysql_config2.php');
require_once("model/CommentStorageMySQL.php");


//$file = "database.txt";
//$db = new ObjectFileDB($file);
//$pdo= new PDO("mysql:host=".Config::MYSQL_HOST.";port=".Config::MYSQL_PORT.";dbname=".Config::MYSQL_DB.";charset=utf8mb4", Config::MYSQL_USER , Config::MYSQL_PASSWORD);
$pdo= new PDO("mysql:host=".MYSQLHOST.";port=".MYSQLPORT.";dbname=".MYSQLDATABASE.";charset=utf8mb4", MYSQLUSER , MYSQLPASSWORD);
var_dump("hello");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$router = new Router(new PlaceStorageMySQL($pdo), new AccountStorageMySQL($pdo), new CommentStorageMySQL($pdo));
//$router = new Router(new PlaceStorageMySQL($file), new AccountStorageMySQL($file), new CommentStorageMySQL($file));
$router->main();

?>
