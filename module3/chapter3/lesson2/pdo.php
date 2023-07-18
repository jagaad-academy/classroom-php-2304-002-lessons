<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$db = "online-store";

//try {
//    $pdo = new PDO("mysql:host=$dbHost;dbname=$db", $dbUser, $dbPassword);
//    $sth = $pdo->query("SELECT * FROM users");
//    $sth->execute();
//    echo "<pre>";
////    $users = $sth->fetch();
//    while($user = $sth->fetch(PDO::FETCH_NUM)){
//        print_r($user);
//    }
//
//} catch (PDOException $exception){
//    echo "Database connection failed!";
//    die;
//}
//
//try {
//    $pdo = new PDO("mysql:host=$dbHost;dbname=$db", $dbUser, $dbPassword);
//    $sth = $pdo->query("SELECT * FROM users");
//    $sth->execute();
//    /* Bind by column number */
//    $sth->bindColumn(2, $email);
//    $sth->bindColumn(3, $password);
//    /* Bind by column name */
//    $sth->bindColumn('address', $address);
//    while($users = $sth->fetch(PDO::FETCH_BOUND)){
//        echo $email . " " . $password . " " . $address . "<br>";
//    }
//
//
//} catch (PDOException $exception){
//    echo "Database connection failed!";
//    die;
//}
//
//try {
//    $pdo = new PDO("mysql:host=$dbHost;dbname=$db", $dbUser, $dbPassword);
//    $sth = $pdo->query("SELECT * FROM users");
//    $sth->execute();
//    echo "<pre>";
//    while($users = $sth->fetch(PDO::FETCH_OBJ)){
//        echo $users->email . "<br>";
//    }
//
//
//} catch (PDOException $exception){
//    echo "Database connection failed!";
//    die;
//}

require_once "Users.php";

//try {
//    echo "<pre>";
//    $usersObject = new Users();
//    print_r($usersObject);
//    $pdo = new PDO("mysql:host=$dbHost;dbname=$db", $dbUser, $dbPassword);
//    $sth = $pdo->query("SELECT * FROM users");
//    $sth->setFetchMode(PDO::FETCH_INTO, $usersObject);
//    $sth->execute();
//
//    /** @var Users $users */
//    while($users = $sth->fetch()){
//        print_r($users);
//    }
//} catch (PDOException $exception){
//    echo "Database connection failed!";
//    die;
//}

try {
    echo "<pre>";
    $pdo = new PDO("mysql:host=$dbHost;dbname=$db", $dbUser, $dbPassword);
    $sth = $pdo->query("SELECT * FROM users");
    $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
    $sth->execute();
    $users = $sth->fetch();
    print_r($users);
} catch (PDOException $exception){
    echo "Database connection failed!";
    die;
}
