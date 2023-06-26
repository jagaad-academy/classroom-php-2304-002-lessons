<?php

/**
 * @return string
 */
function getFunctionName(): string
{
    $functionName= 'read';

    $method = $_SERVER['REQUEST_METHOD'];
    $idExistsInGet = isset($_GET['id']);

    if($method == 'POST'){
        if($idExistsInGet){
            $functionName = 'update';
        } else {
            $functionName = 'create';
        }

        if(isset($_GET['login'])){
            $functionName = 'checkUserData';
        }

        if(isset($_GET['register'])){
            $functionName = 'register';
        }
    } else {
        if($idExistsInGet){
            $functionName = 'delete';
        }

        if(isset($_GET['create'])){
            $functionName = 'showCreateForm';
        }

        if(isset($_GET['admin'])){
            $functionName = 'showAdminPage';
        }

        if(isset($_GET['update'])){
            $functionName = 'showUpdateForm';
        }

        if(isset($_GET['login'])){
            $functionName = 'showLoginPage';
        }

        if(isset($_GET['logout'])){
            $functionName = 'logOutAndRedirect';
        }

        if(isset($_GET['incomes'])){
            $functionName = 'incomes';
        }

        if(isset($_GET['expenses'])){
            $functionName = 'expenses';
        }

        if(isset($_GET['register'])){
            $functionName = 'showRegisterForm';
        }
    }

    return $functionName;
}


/**
 * @param mixed $userEmail
 * @return mixed
 * @throws Exception
 */
function getUserIdByEmail(mixed $userEmail): int
{
    global $mysqli;

    $sqlUserId = sprintf("SELECT user_id FROM users WHERE email='%s'", $userEmail);
    $result = $mysqli->query($sqlUserId);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (is_array($row)) {
        $userId = $row['user_id'];
    } else {
        throw new Exception('User does not exist!');
    }
    return (int)$userId;
}


/**
 * @param int $id
 * @return string|bool
 * @throws Exception
 */
function getUserEmailById(int $id): string|bool
{
    global $mysqli;

    $sqlUserId = sprintf("SELECT email FROM users WHERE user_id=%d", $id);
    $result = $mysqli->query($sqlUserId);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (is_array($row)) {
        $email = $row['email'];
    } else {
        throw new Exception('User does not exist!');
    }
    return $email;
}

function redirectIfUserIsNotLoggedIn(): void
{
    if(!isset($_SESSION['user']) || !is_array($_SESSION['user'])){
        echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
        exit;
    }
}
