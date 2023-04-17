<?php

require_once __DIR__ . '/../modules/connection.php';
require_once __DIR__ . '/../modules/alert-message.php';

$mysqli = connect();

$sql = <<<SQL
    SELECT id, username, password, role 
    FROM `users` 
    WHERE username = ?
SQL;

// prepare statement to avoid SQL injection
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

$isMatched = is_array($row) && $row['password'] === $_POST['password'];

if ($isMatched) {
    echo 'User logged in! :D';
    // redirect the user using HTML
    echo '<meta http-equiv="refresh" content="2; url=/admin.php" />';
    $_SESSION['logged_in'] = true;
    $_SESSION['user_role'] = $row['role'];
    die;
}

storeAlertMessage('<b>Oops!</b> Username or password invalid!', ALERT_MSG_ERROR);
header('Location: /login.php');
