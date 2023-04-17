<?php

session_start();

define('ALERT_MSG_SUCCESS', 1);
define('ALERT_MSG_ERROR', 2);

function hasAlertStatus(string $status): bool {
    return isset($_SESSION['alert_status']) 
        && $_SESSION['alert_status'] === $status;
}

function extractAlertMessage() {
    $message = $_SESSION['alert_message'];

    unset(
        $_SESSION['alert_message'], 
        $_SESSION['alert_status']
    );
    
    return $message;
}

function storeAlertMessage(string $message, string $status) {
    $_SESSION['alert_message'] = $message;
    $_SESSION['alert_status'] = $status;
}
