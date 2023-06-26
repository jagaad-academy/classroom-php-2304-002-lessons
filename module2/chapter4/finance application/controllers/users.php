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
    //1 variant
//    $password = password_hash($password, PASSWORD_DEFAULT);
//    $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", $email, $password);

    //2 variant
    $sql = sprintf("SELECT * FROM users WHERE email='%s'", $email);
    $result = $mysqli->query($sql);
    $user = $result->fetch_array(MYSQLI_ASSOC);

    if((bool)$user === false){
        echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
        exit;
    }

    if(!password_verify($password, $user['password'])){
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

/**
 * @return void
 */
function showRegisterForm(): void
{
    require_once __DIR__ . '/../templates/pages/users/register.php';
}

function register(): void
{
    global $mysqli;

    $fullName = filter_input(INPUT_POST, 'fullName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = sprintf("INSERT INTO users (full_name, email, password) VALUES ('%s', '%s', '%s')", $fullName, $email, $password);

    $statement = $mysqli->prepare($sql);
    $statement->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/admin\'" />';
}
