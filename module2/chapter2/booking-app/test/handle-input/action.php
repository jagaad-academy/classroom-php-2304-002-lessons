<?php

/*
$number = 'asdad12321asda44sd##';

var_dump(filter_var($number, FILTER_SANITIZE_NUMBER_INT));
*/

/*
$email = "john(.doe)@exa//mple.com";

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
echo $email;
*/

$number = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_NUMBER_INT);

echo $number;

$email = $_POST['email'];

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

/*
if ($email === false) {
    echo 'Invalid e-mail!';
} else {
    echo $email;
}
*/

//echo '<pre>';
//var_dump($_POST);
die;