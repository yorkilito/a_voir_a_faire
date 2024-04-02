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
require_once("model/CommentStorageMySQL.php");

error_reporting(E_ALL);
ini_set("display_errors", 0);


$pdo= new PDO("mysql:host=".getenv("MYSQLHOST").";port=".getenv("MYSQLPORT").";dbname=".getenv("MYSQLDATABASE").";charset=utf8mb4", getenv("MYSQLUSER") , getenv("MYSQLPASSWORD"));


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$router = new Router(new PlaceStorageMySQL($pdo), new AccountStorageMySQL($pdo), new CommentStorageMySQL($pdo));
$router->main();

?>
