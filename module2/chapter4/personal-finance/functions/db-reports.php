<?php

function top5BiggestTransactions() : array
{
    $mysqli = connect();

    $sql = <<<SQL
        SELECT SUM(t.amount) AS total, t.category, t.type
        FROM transactions t
        JOIN accounts a ON a.account_id=t.account_id
        WHERE a.user_id = ?
        GROUP BY t.category, t.type
        ORDER BY total DESC
        LIMIT 5;
    SQL;

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', authenticatedUser()['id']);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

function transactionsByIntervalAndAccount($begin, $ends, $accountId): array
{
    $mysqli = connect();

    $sql = <<<SQL
        SELECT 
            t.name,
            t.amount,
            t.category,
            t.transaction_date,
            a.name AS account_name
        FROM transactions t
        JOIN accounts a ON a.account_id=t.account_id
        WHERE t.transaction_date >= ?
        AND t.transaction_date <= ?
        AND a.account_id = ?
        AND a.user_id = ?
    SQL;

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        'ssss', 
        $begin,
        $ends,
        $accountId,
        authenticatedUser()['id']
    );
    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}