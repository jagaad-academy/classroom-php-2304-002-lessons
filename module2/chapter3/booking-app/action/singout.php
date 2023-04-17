<?php

session_start();

$_SESSION['logged_in'] = false;

echo 'Logout successfully! :D';
// redirect the user using HTML
echo <<<HTML
<meta http-equiv="refresh" content="2; url='/login.php'" />
HTML;
die;
