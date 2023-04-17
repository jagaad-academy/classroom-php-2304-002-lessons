<?php

require_once __DIR__ . '/../modules/alert-message.php';

// mocked user and pass
$users = [
    ['username'=>'lucas', 'password'=>'123', 'role'=>'admin'],
    ['username'=>'user', 'password'=>'321', 'role'=>'user'],
];

$loggedIn = false;

foreach ($users as $user) {
    $isMatched = $_POST['username'] === $user['username'] 
        && $_POST['password'] === $user['password'];

    if ($isMatched) {
        echo 'User logged in! :D';
        // redirect the user using HTML
        echo '<meta http-equiv="refresh" content="2; url=/admin.php" />';
        $_SESSION['logged_in'] = true;
        $_SESSION['user_role'] = $user['role'];
        die;
    }
}

storeAlertMessage('<b>Oops!</b> Username or password invalid!', ALERT_MSG_ERROR);

header('Location: /login.php');
