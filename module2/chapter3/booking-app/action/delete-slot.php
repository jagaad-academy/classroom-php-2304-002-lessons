<?php

require_once __DIR__ . '/../modules/alert-message.php';

require_once __DIR__ . '/../modules/slots-storage.php';

// @todo add the user authorization

$slotId = $_GET['id'];

deleteSlot($slotId);

storeAlertMessage("<b>Success!</b> Slot '$slotId' delete! :D", ALERT_MSG_SUCCESS);

// redirect to the admin page
header('Location: /admin.php');
