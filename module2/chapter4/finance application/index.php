<?php
require_once __DIR__ . '/db/mysql-connect.php';
require_once __DIR__ . '/functions/utils.php';

$url = $_SERVER['REQUEST_URI'];

//Routing
/**
 * Incomes:
 * Create - POST method + URL '/controllers/incomes.php'
 * Read - GET method + URL '/controllers/incomes.php'
 * Update - POST method + URL '/controllers/incomes.php?id=%id%'
 * Delete - GET method  + URL '/controllers/incomes.php?id=%id%'

 * Expenses:
 * Create - POST method + URL '/controllers/expenses.php'
 * Read - GET method + URL '/controllers/expenses.php'
 * Update - POST method + URL '/controllers/expenses.php?id=%id%'
 * Delete - GET method  + URL '/controllers/expenses.php?id=%id%'

 * User:
 * Read - GET method + URL '/controllers/users.php'
 */
$file = match($url){
    '/controllers/incomes.php' => __DIR__ . '/controllers/incomes.php',
    '/controllers/expenses.php' => __DIR__ . '/controllers/expenses.php',
    '/controllers/users.php' => __DIR__ . '/controllers/users.php',
};

require_once $file;

require_once __DIR__ . '/db/mysql-close.php';
