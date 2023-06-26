<?php
redirectIfUserIsNotLoggedIn();

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

function incomes(): void
{
    global $mysqli;

    $sql = "SELECT i.*, c.name as category_name, a.name as account_name, u.full_name 
            FROM incomes i
            LEFT JOIN categories c ON c.category_id=i.category_id
            LEFT JOIN accounts a ON a.account_id=i.account_id
            LEFT JOIN users u ON u.user_id=i.user_id
            ORDER BY i.amount DESC
            LIMIT 10";
    $result = $mysqli->query($sql);

    $incomes = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($incomes as $key => $income) {
        switch ($income['periodicity']){
            case '0':
                $incomes[$key]['periodicity_label'] = 'No';
                break;
            case '1':
                $incomes[$key]['periodicity_label'] = 'Fixed';
                break;
            case '2':
                $incomes[$key]['periodicity_label'] = 'Installments';
                break;
        }

        switch ($income['status']){
            case '0':
                $incomes[$key]['status_label'] = 'unreceived';
                break;
            case '1':
                $incomes[$key]['status_label'] = 'received';
                break;
        }
    }

    require_once __DIR__ . '/../templates/pages/revenue/incomes.php';
}

function expenses()
{
    global $mysqli;

    $sql = "SELECT e.*, c.name as category_name, a.name as account_name, u.full_name 
            FROM expenses e
            LEFT JOIN categories c ON c.category_id=e.category_id
            LEFT JOIN accounts a ON a.account_id=e.account_id
            LEFT JOIN users u ON u.user_id=e.user_id
            ORDER BY e.amount DESC
            LIMIT 5";
    $result = $mysqli->query($sql);

    $expenses = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($expenses as $key => $expense) {
        switch ($expense['periodicity']){
            case '0':
                $expenses[$key]['periodicity_label'] = 'No';
                break;
            case '1':
                $expenses[$key]['periodicity_label'] = 'Fixed';
                break;
            case '2':
                $expenses[$key]['periodicity_label'] = 'Installments';
                break;
        }

        switch ($expense['status']){
            case '0':
                $expenses[$key]['status_label'] = 'unreceived';
                break;
            case '1':
                $expenses[$key]['status_label'] = 'received';
                break;
        }
    }

    require_once __DIR__ . '/../templates/pages/revenue/expenses.php';
}

//echo "<img src='/functions/generateGraph.php'>";
