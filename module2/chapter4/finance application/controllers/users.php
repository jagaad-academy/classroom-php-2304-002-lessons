<?php

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}


/**
 * @return void
 */
function showAdminPage(): void
{
    redirectIfUserIsNotLoggedIn();
    require_once __DIR__ . '/../templates/pages/admin.php';
}

/**
 * @return void
 */
function showHomePage(): void
{
    require_once __DIR__ . '/../templates/pages/home.php';
}


/**
 * @return void
 */
function showLoginPage(): void
{
    require_once __DIR__ . '/../templates/pages/users/login.php';
}

/**
 * @return void
 */
function checkUserData(): void
{
    global $mysqli;

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", $email, $password);
    $result = $mysqli->query($sql);
    $user = $result->fetch_array(MYSQLI_ASSOC);

    if((bool)$user === false){
        echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
        exit;
    }

    $_SESSION['user'] = $user;

    echo '<meta http-equiv="refresh" content="1; url=\'/admin\'" />';
}

/**
 * @return void
 */
function logOutAndRedirect(): void
{
    unset($_SESSION['user']);
    $_SESSION = [];
    session_destroy();

    echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
}
