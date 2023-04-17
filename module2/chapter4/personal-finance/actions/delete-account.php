<?php

require_once __DIR__ . '/../boot.php';

try {
    $accountId = filter_input(INPUT_GET, 'account_id', FILTER_SANITIZE_NUMBER_INT);

    deleteAccount($accountId);

    storeAlertMessage('<b>Success!</b> Account deleted.', ALERT_MSG_SUCCESS);
    header("Location: /index.php");
    die;
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}
