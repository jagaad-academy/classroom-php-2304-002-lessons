<?php
require_once __DIR__ . '/boot.php';

define('PAGE_TITLE', 'Register');
require_once __DIR__ . '/views/header.php';
?>

<form action="actions/create-user.php" method="post">
    <?php if (hasAlertStatus(ALERT_MSG_ERROR)): ?>
    <i><?=extractAlertMessage()?></i><br /><br />
    <?php endif ?>

    Name: <br />
    <input type="text" name="full_name" placeholder="Full Name" required/> <br />

    Email: <br />
    <input type="email" name="email" placeholder="Email" required/> <br />

    Password: <br />
    <input type="password" name="password" required/> <br />

    Repeat Password: <br />
    <input type="password" name="repeat_password" required/> <br /><br />

    <button type="submit">Register</button>
</form>

<br />

<a href="/login.php">Go to Login</a>

<?php
require_once __DIR__ . '/views/footer.php';
?>