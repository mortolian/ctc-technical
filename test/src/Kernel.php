<?php

use Gideon\Test\Database;

const BASE_DIR = __DIR__ . "/../";

include_once BASE_DIR . "vendor/autoload.php";

session_start();

$dotenv = Dotenv\Dotenv::createImmutable( BASE_DIR);
$dotenv->load();

$config = include_once BASE_DIR . "config/config.php";

$database = new Database($config);
$db = $database->connect();