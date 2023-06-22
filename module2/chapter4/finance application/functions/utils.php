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
    } else {
        if($idExistsInGet){
            $functionName = 'delete';
        }

        if(isset($_GET['create'])){
            $functionName = 'showCreateForm';
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
        throw new Exception('User is not exist!');
    }
    return (int)$userId;
}
