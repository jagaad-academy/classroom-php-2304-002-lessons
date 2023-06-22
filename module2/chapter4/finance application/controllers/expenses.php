<?php
require_once __DIR__ . '/../db/mysql-connect.php';
require_once __DIR__ . '/../functions/utils.php';

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}


function showCreateForm()
{
    global $mysqli;

    $sql = "SELECT * FROM categories";
    $result = $mysqli->query($sql);
    $categories = $result->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT * FROM accounts";
    $result = $mysqli->query($sql);
    $accounts = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/expenses/create.php';
}

/**
 * @throws Exception
 */
function create(): void
{
    global $mysqli;

    $name = filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $categoryId = 1;
    $accountId = 1;
//    $categoryId = filter_input(INPUT_POST, 'categories');
//    $accountId = filter_input(INPUT_POST, 'accounts');
    $periodicity = filter_input(INPUT_POST, 'periodicity');
    $status = filter_input(INPUT_POST, 'status');
    $userEmail = filter_input(INPUT_POST, 'user-email');

    $userId = getUserIdByEmail($userEmail);

    $sql = sprintf("INSERT INTO expenses (expense_id, name, category_id, account_id, date, periodicity, status, user_id) 
                            VALUES(NULL, '%s', %d, %d, '%s', %d, %d, %d)",
        $name, $categoryId, $accountId, $date, $periodicity, $status, $userId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/controllers/expenses.php\'" />';
}


/**
 * @throws Exception
 */
function update(): void
{
    global $mysqli;

    $name = filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $categoryId = filter_input(INPUT_POST, 'categories');
    $accountId = filter_input(INPUT_POST, 'accounts');
    $periodicity = filter_input(INPUT_POST, 'periodicity');
    $status = filter_input(INPUT_POST, 'status');
    $userEmail = filter_input(INPUT_POST, 'user-email');

    $userId = getUserIdByEmail($userEmail);

    $sql = sprintf("UPDATE expenses (income_id, name, category_id, account_id, date, periodicity, status, user_id) VALUES(NULL, '%s', %d, %d, '%s', %d, %d, %d)",
        $name, $date, $categoryId, $accountId, $periodicity, $status, $userId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();
}

function read(): void
{
    global $mysqli;

    $sql = "SELECT * FROM expenses";
    $result = $mysqli->query($sql);
    $expenses = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/expenses/list.php';
}

function delete()
{
    global $mysqli;
    $expenseId = filter_input(INPUT_GET, 'id');
    $sql = sprintf("DELETE FROM expenses WHERE expense_id=%d", (int)$expenseId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/controllers/expenses.php\'" />';
}

require_once __DIR__ . '/../db/mysql-close.php';
