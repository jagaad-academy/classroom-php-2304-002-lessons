<?php
require_once "vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__, '.env-local');
$dotenv->load();

$dbHost = $_ENV['DATABASE_HOST'];
var_dump($dbHost);
$dbHost = $_SERVER['DATABASE_HOST'];
var_dump($dbHost);
