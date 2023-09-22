<?php
/**
 * form.php
 * hennadii.shvedko
 * 22.09.2023
 */

$userName = $_POST['username'] ?? '';

if(!empty($userName)){
    echo "Welcome, $userName!";
} else {
    echo "No username provided!";
}
