<?php

session_start();

require_once "vendor/autoload.php";

// using eloquent (orm) from native php
// composer require illuminate/database

// make allias for namespace to use class
use Illuminate\Database\Capsule\Manager as Database;

//make object from class to be used
$database = new Database;

//*************************************************************************

//according to constants in config file
$database->addConnection([
    "driver" => Driver,
    "host" => Host,
    "database" => Database,
    "username" => Username,
    "password" => Password,
]);

//composer
$database->setAsGlobal();
$database->bootEloquent();

//***************************************************************************

if (isset($_GET["glass"]) && is_numeric($_GET["glass"]) && $_GET["glass"] >= 0) {
    require_once "Views/detailShow.php";
} else {
    require_once "Views/recordShow.php";
}