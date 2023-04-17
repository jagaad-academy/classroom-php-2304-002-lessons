<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=personal_finance', 'root', '');
    $rows = $pdo->query('SELECT transaction_id, name, category FROM transactions', PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('Something went wrong. Please, try again later.');
}

$fullName = 'PDO Test';
$email = 'pdo@gmail.com';
$password = password_hash('123', PASSWORD_DEFAULT);
$isActive = 1;

$stm = $pdo->prepare(<<<SQL
    INSERT INTO users (full_name, email, password, is_active) 
    VALUES (:full_name, :email, :password, :is_active)
SQL);

$stm->bindParam(':full_name', $fullName);
$stm->bindParam(':email', $email);
$stm->bindParam(':password', $password);
$stm->bindParam(':is_active', $isActive);

$stm->execute();

echo 'User inserted! :)';

