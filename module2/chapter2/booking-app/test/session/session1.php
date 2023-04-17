<?php

session_start();

$_SESSION['name'] = 'Lucas';

echo $_SESSION['name'];
