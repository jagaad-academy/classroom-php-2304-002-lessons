<?php

$user = "root";
$pass = "";
$dbName = "online-store";

try {
    $conn = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $pass);

    $stmt = $conn->prepare("INSERT INTO users (email, password, address, test) VALUES (:email, :pass, :address, :test)");
//
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pass", $password);
    $stmt->bindParam(":test", $test, PDO::PARAM_BOOL);
    $stmt->bindParam(":address", $address);
//
//// insert one row
    $email = "alexander@yeahoo.com";
    $password = password_hash("123", PASSWORD_DEFAULT );
    $address = "test address Alexander";
    $test = "test";
    $stmt->execute();

// insert another row with different values
//    $email = "hennadii.shvedko@yahoo.com";
//    $password = password_hash("456", PASSWORD_DEFAULT );
//    $address = "test address 12";
//    $stmt->execute();

    echo "<pre>";

    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    foreach ($stmt as $row){
        print_r($row);
    }
} catch (PDOException $exception) {
    print_r($exception);
    die;
}

