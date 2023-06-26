<?php
redirectIfUserIsNotLoggedIn();

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
function showUpdateForm(): void
{
    global $mysqli;

    $id = htmlspecialchars($_GET['id']);
    $sql = sprintf("SELECT * FROM expenses WHERE expense_id=%d", $id);
    $result = $mysqli->query($sql);
    $expense = $result->fetch_array(MYSQLI_ASSOC);

    if($expense === false){
        throw new Exception('Expense ' . $id . ' not found!');
    }

    $expense['email'] = getUserEmailById($expense['user_id']);

    $sql = "SELECT * FROM categories";
    $result = $mysqli->query($sql);
    $categories = $result->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT * FROM accounts";
    $result = $mysqli->query($sql);
    $accounts = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/expenses/update.php';
}

/**
 * @throws Exception
 */
function create(): void
{
    global $mysqli;

    $name = filter_input(INPUT_POST, 'name');
    $amount = filter_input(INPUT_POST, 'amount');
    $date = filter_input(INPUT_POST, 'date');
    $categoryId = filter_input(INPUT_POST, 'categories');
    $accountId = filter_input(INPUT_POST, 'accounts');
    $periodicity = filter_input(INPUT_POST, 'periodicity');
    $status = filter_input(INPUT_POST, 'status');
    $userEmail = filter_input(INPUT_POST, 'user-email');

    $userId = getUserIdByEmail($userEmail);

    $sql = sprintf("INSERT INTO expenses (expense_id, name, amount, category_id, account_id, date, periodicity, status, user_id) 
                            VALUES(NULL, '%s', %f, %d, %d, '%s', %d, %d, %d)",
        $name, $amount, $categoryId, $accountId, $date, $periodicity, $status, $userId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/expenses\'" />';
}


/**
 * @throws Exception
 */
function update(): void
{
    global $mysqli;

    $name = filter_input(INPUT_POST, 'name');
    $amount = filter_input(INPUT_POST, 'amount');
    $date = filter_input(INPUT_POST, 'date');
    $categoryId = filter_input(INPUT_POST, 'categories');
    $accountId = filter_input(INPUT_POST, 'accounts');
    $periodicity = filter_input(INPUT_POST, 'periodicity');
    $status = filter_input(INPUT_POST, 'status');
    $userEmail = filter_input(INPUT_POST, 'user-email');
    $expenseId = htmlspecialchars($_GET['id']);
    $userId = getUserIdByEmail($userEmail);

    $sql = sprintf("UPDATE expenses 
        SET name='%s', amount=%f, category_id=%d, account_id=%d, date='%s', periodicity=%d, status=%d, user_id=%d
        WHERE expense_id=%d",
        $name, $amount, $categoryId, $accountId, $date, $periodicity, $status, $userId, $expenseId);

    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/expenses\'" />';
}
/**
 * @return void
 */
function read(): void
{
    global $mysqli;

    $sql = "SELECT e.*, c.name as category_name, a.name as account_name, u.full_name 
            FROM expenses e
            LEFT JOIN categories c ON c.category_id=e.category_id
            LEFT JOIN accounts a ON a.account_id=e.account_id
            LEFT JOIN users u ON u.user_id=e.user_id";
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

    require_once __DIR__ . '/../templates/pages/expenses/list.php';
}

/**
 * @return void
 */
function delete(): void
{
    global $mysqli;
    $expenseId = htmlspecialchars($_GET['id']);;
    $sql = sprintf("DELETE FROM expenses WHERE expense_id=%d", (int)$expenseId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/expenses\'" />';
}

require_once __DIR__ . '/../db/mysql-close.php';
