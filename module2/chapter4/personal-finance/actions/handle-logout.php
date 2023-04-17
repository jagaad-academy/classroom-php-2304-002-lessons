<?php

require_once __DIR__ . '/../boot.php';

logout();
header('Location: /login.php');
