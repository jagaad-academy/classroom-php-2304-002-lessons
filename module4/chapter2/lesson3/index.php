<?php

use Dotenv\Dotenv;
use HennadiiShvedko\Lesson3\DB;

require_once "vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__); //$_ENV
$dotenv->safeLoad();

try {

    while (true){
        $db = new DB();
        $sql = "SELECT * FROM authors";
        $stm = $db->pdo->prepare($sql);
        $stm->execute();
        $stm->fetchAll();
        echo ".";
        sleep(0.5);
    }
} catch (Exception $exception){
    echo $exception->getMessage();
    die;
}
