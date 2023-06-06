<?php

$email = htmlspecialchars($_POST['email']);

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo $email . "<br>";
} else {
    echo "Invalid email!" . "<br>";
}

$emailSanitized = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

echo $email . "<br>";
echo $emailSanitized . "<br>";

die;


?>
<!---->
<!--<script>-->
<!--    location.href = 'google.com'-->
<!--</script>-->

<!--hennadii.shvedko@jagaad.com <script>location.href = 'google.com'</script>-->
