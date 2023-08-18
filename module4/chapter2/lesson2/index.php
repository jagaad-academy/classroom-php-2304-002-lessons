<?php

use Dotenv\Dotenv;
use HennadiiShvedko\Lesson2\DB;

require_once "vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__); //$_ENV
$dotenv->safeLoad();

$db = new DB();
try{
    $db->pdo->beginTransaction();

    $sql = "INSERT INTO users (email, password, is_active) VALUES (?,?,?)";
    $stm = $db->pdo->prepare($sql);
    $stm->execute(['alexander@jagaad.com', password_hash('123', PASSWORD_DEFAULT), 1]);

    $sql = "INSERT INTO user (email, password, is_active) VALUES (?,?,?)";
    $stm = $db->pdo->prepare($sql);
    $stm->execute(['alexander@gmail.com', password_hash('123', PASSWORD_DEFAULT), 1]);

    $db->pdo->commit();
    echo "Done!";
} catch (Exception $exception){
    echo $exception->getMessage();
    $db->pdo->rollBack();
    die;
}

