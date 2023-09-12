<?php
/**
 * index.php
 * hennadii.shvedko
 * 11.09.2023
 */


$servername = "mariadb";
$username = "testuser";
$password = "testuser";
$dbname = "test";
$port = "3306";
try {
    new PDO("mysql:host=$servername;port=$port;dbname=$dbname",$username,$password);
    echo "Connected!";
} catch (PDOException $exception){
    echo "Connection failed!";
    echo $exception->getMessage();
}

die;
