<?php

// file responsible to startup the application config

session_start();

// functions

require_once __DIR__ . '/functions/connection.php';

require_once __DIR__ . '/functions/auth.php';
require_once __DIR__ . '/functions/db-transactions.php';
require_once __DIR__ . '/functions/db-users.php';
require_once __DIR__ . '/functions/db-account.php';
require_once __DIR__ . '/functions/db-reports.php';
require_once __DIR__ . '/functions/validate-transaction.php';
require_once __DIR__ . '/functions/validate-user.php';
require_once __DIR__ . '/functions/validate-account.php';
require_once __DIR__ . '/functions/alert-message.php';

/* @todo tasks
 1. add the delete/update to the transaction
*/
