<?php
session_start();

$userEmail = 'hennadii.shvedko@jagaad.com';
$userPass = '1234';

$username = $_POST['email'];
$password = $_POST['password'];

if($username == $userEmail && $password == $userPass){
    $_SESSION['userLoggedIn'] = true;
    echo '<meta http-equiv="refresh" content="1; url=\'admin.php\'" />';
} else {
    echo '<meta http-equiv="refresh" content="1; url=\'signin.php\'" />';
}
