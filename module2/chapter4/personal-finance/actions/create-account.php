<?php

require_once __DIR__ . '/../boot.php';

try {
    $inputs = [
        'name' => filter_input(INPUT_POST, 'account_name'),
        'description' => filter_input(INPUT_POST, 'account_description'),
        'type' => filter_input(INPUT_POST, 'account_type'),
    ];

    validateAccountInputs($inputs);

    insertAccount($inputs);

    storeAlertMessage('<b>Success!</b> Account created.', ALERT_MSG_SUCCESS);
    header("Location: /index.php");
    die;
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}
