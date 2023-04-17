<?php

function connect() {
    // 1. connect the DB
    $mysqli = new mysqli('localhost', 'root', 'root', 'php_course');

    // 2. check the connection
    if ($mysqli->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
        exit;
    }

    return $mysqli;
}