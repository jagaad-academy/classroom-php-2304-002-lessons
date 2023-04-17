<?php

require_once __DIR__ . '/connection.php';

function insertUser(array $inputs)
{
    $mysqli = connect();
    $sql = <<<SQL
        INSERT INTO users (
            full_name, 
            email, 
            password, 
            is_active
        ) VALUES (?, ?, ?, ?)
    SQL;

    $isActive = 1;
    $passwordHash = password_hash($inputs['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        'ssss', 
        $inputs['full_name'],
        $inputs['email'],
        $passwordHash,
        $isActive
    );
    $stmt->execute();
}

function getUserByEmail(string $email): ?array
{
    $mysqli = connect();

    $sql = <<<SQL
        SELECT user_id, full_name, email, password, is_active 
        FROM users WHERE email = ?
    SQL;

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
