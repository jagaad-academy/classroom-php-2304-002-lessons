<?php

try {
    return new PDO('mysql:host=localhost;dbname=manage_bills', 'root', '');
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('Something went wrong. Please, try again later.');
}

