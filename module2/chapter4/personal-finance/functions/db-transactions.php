<?php

require_once __DIR__ . '/connection.php';

function insertTransaction(array $inputs)
{
    $mysqli = connect();
    $sql = <<<SQL
        INSERT INTO transactions (
            name, 
            amount, 
            category, 
            transaction_date, 
            occurrence,
            status,
            type,
            account_id
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    SQL;

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        'ssssssss', 
        $inputs['name'],
        $inputs['amount'],
        $inputs['category'],
        $inputs['transaction_date'],
        $inputs['occurrence'],
        $inputs['status'],
        $inputs['type'],
        $inputs['account_id']
    );
    $stmt->execute();
}

function findTransactions(string $type): array
{
    $mysqli = connect();
    $sql = <<<SQL
        SELECT t.*, a.name AS account_name
        FROM transactions t
        JOIN accounts a ON t.account_id=a.account_id
        WHERE t.type = ?
        AND a.user_id = ?
    SQL;

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $type, authenticatedUser()['id']);
    $stmt->execute();

    $result = $stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
