<?php

require_once __DIR__ . '/../boot.php';

// @todo protect page for only logged in users

try {
    $inputs = [
        'full_name' => filter_input(INPUT_POST, 'full_name'),
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'password'),
        'repeat_password' => filter_input(INPUT_POST, 'repeat_password'),
    ];

    validateUserInputs($inputs);

    insertUser($inputs);

    storeAlertMessage('<b>Success!</b> User created.', ALERT_MSG_SUCCESS);
    header("Location: /login.php");
    die;
} catch (InvalidArgumentException $exception) {
    storeAlertMessage('<b>Error!</b> ' . $exception->getMessage(), ALERT_MSG_ERROR);
    header("Location: /register.php");
    die;
}
