<?php
require_once __DIR__ . '/boot.php';

define('PAGE_TITLE', 'Login');
require_once __DIR__ . '/views/header.php';
?>

<form action="actions/handle-login.php" method="post">
    <?php if (hasAlertStatus(ALERT_MSG_ERROR)): ?>
    <i><?=extractAlertMessage()?></i><br /><br />
    <?php endif ?>

    <?php if (hasAlertStatus(ALERT_MSG_SUCCESS)): ?>
    <i><?=extractAlertMessage()?></i><br /><br />
    <?php endif ?>

    Email: <br />
    <input type="email" name="email" /> <br />
    Password: <br />
    <input type="password" name="password" /> <br /><br />

    <button type="submit">Login</button>
</form>

<br />

<a href="/register.php">Register</a>

<?php
require_once __DIR__ . '/views/footer.php';
?>