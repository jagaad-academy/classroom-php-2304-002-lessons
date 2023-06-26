<?php

session_start();

require_once __DIR__ . '/libs/jpgraph-4.4.1/src/jpgraph.php';
require_once __DIR__ . '/libs/jpgraph-4.4.1/src/jpgraph_line.php';

require_once __DIR__ . '/db/mysql-connect.php';
require_once __DIR__ . '/functions/utils.php';

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

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

$get = '';
if(str_contains(strtolower($url), 'delete') || str_contains(strtolower($url), 'update')){
    /**
     *  /incomes/delete/id/345
     *  $urlParams[0] -> ''
     *  $urlParams[1] -> 'incomes'
     *  $urlParams[2] -> 'delete'
     *  $urlParams[3] -> 'id'
     *  $urlParams[4] -> '345'
     */
    $urlParams = explode('/', $url);
    $get = $urlParams[4] ?? '';
    $_GET['id'] = $get;
    $url = '/' . $urlParams[1] . '/' . $urlParams[2] . '/' . $urlParams[3];
}

$routing = match($url){
    '/incomes', '/incomes/delete/id' => [ 'file' => __DIR__ . '/controllers/incomes.php', 'get' => ''],
    '/incomes/update/id' => [ 'file' => __DIR__ . '/controllers/incomes.php', 'get' => 'update'],
    '/incomes/create' => [ 'file' => __DIR__ . '/controllers/incomes.php', 'get' => 'create'],
    '/expenses', '/expenses/delete/id' => [ 'file' => __DIR__ . '/controllers/expenses.php', 'get' => ''],
    '/expenses/update/id' => [ 'file' => __DIR__ . '/controllers/expenses.php', 'get' => 'update'],
    '/expenses/create' => [ 'file' => __DIR__ . '/controllers/expenses.php', 'get' => 'create'],
    '/revenue/incomes' => [ 'file' => __DIR__ . '/controllers/revenue.php', 'get' => 'incomes'],
    '/revenue/expenses' => [ 'file' => __DIR__ . '/controllers/revenue.php', 'get' => 'expenses'],
    '/users' => [ 'file' => __DIR__ . '/controllers/users.php', 'get' => ''],
    '/users/register' => [ 'file' => __DIR__ . '/controllers/users.php', 'get' => 'register'],
    '/login' => [ 'file' => __DIR__ . '/controllers/users.php', 'get' => 'login'],
    '/logout' => [ 'file' => __DIR__ . '/controllers/users.php', 'get' => 'logout'],
    '/admin' => [ 'file' => __DIR__ . '/controllers/users.php', 'get' => 'admin'],
    default => [ 'file' => __DIR__ . '/templates/pages/home.php', 'get' => ''],
};

$_GET[$routing['get']] = $routing['get'];
require_once $routing['file'];

require_once __DIR__ . '/db/mysql-close.php';
