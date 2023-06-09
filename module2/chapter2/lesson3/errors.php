<?php

//ini_set('display_errors', '0');

//error_reporting(E_ALL & ~E_WARNING);

//error handler function
function customError($errno, $errstr)
{
    echo "<b>Error:</b> [$errno] $errstr";
    //send email to dev
}
function customWarning($errno, $errstr)
{
    echo "<b>WARNING!!!:</b> [$errno] $errstr";
    //send email to dev
}

//set error handler
set_error_handler("customError");
//set_error_handler("customWarning", E_USER_WARNING);

//trigger error
//echo($test);

//trigger error
$test = 2;
if ($test >= 1) {
    trigger_error("Value must be 1 or below", E_USER_ERROR);
} else {
    trigger_error("Value must be 2 or higher", E_ERROR);
}
