<?php

session_start();

if(isset($_SESSION['userLoggedIn'])){
    unset($_SESSION['userLoggedIn']);
}

session_destroy();

echo '<meta http-equiv="refresh" content="0; url=\'signin.php\'" />';
