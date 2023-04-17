<?php

require_once __DIR__ . '/../modules/alert-message.php';

require_once __DIR__ . '/../modules/slots-storage.php';

// new slot
$slot = [
    'id' => uniqid(),
    'name' => htmlspecialchars($_POST['slotName']),
    'description' => htmlspecialchars($_POST['slotDescription']),
    'booked' => false,
];

try {
    // @todo: role validation
    addSlot($slot);

    storeAlertMessage('<b>Success!</b> Slot created! :D', ALERT_MSG_SUCCESS);

    // redirect to the admin page
    header('Location: /admin.php');
} catch (\Exception $exception) {
    // error handling
    storeAlertMessage('<b>Error!</b> Error on create slot! :/', ALERT_MSG_ERROR);
    // fake log
    //log('error on add slot', $exception->getMessage());
    // redirect to the admin page
    header('Location: /admin.php');
}
