<?php

define('DB_SLOTS', __DIR__ . '/../db/db_slots.json');

function getSlots() {
    $slots = [];
    // read the filesystem slots
    if (file_exists(DB_SLOTS)) {
        $fileContent = file_get_contents(DB_SLOTS);
        // transform it from string to array
        $slots = json_decode($fileContent, true, 512, JSON_THROW_ON_ERROR);
    }
    return $slots;
}

function addSlot(array $slot) {
    $slots = getSlots();

    // append the new slot
    $slots[] = $slot;

    updateSlots($slots);

    return $slots;
}

function switchStatus(string $slotId) {
    $slots = getSlots();

    // find the array key of the slotId received
    $slotFoundKey = getArrayKeyBySlotId($slots, $slotId);
    
    // switch the booked status
    $slots[$slotFoundKey]['booked'] = !$slots[$slotFoundKey]['booked'];

    updateSlots($slots);

    return $slots;
}

function deleteSlot(string $slotId) {
    $slots = getSlots();

    // find the array key of the slotId received
    $slotFoundKey = getArrayKeyBySlotId($slots, $slotId);
    
    // delete array item by key
    unset($slots[$slotFoundKey]);
    
    updateSlots($slots);

    return $slots;
}

function getArrayKeyBySlotId(array $slots, string $slotId) {
    // find the array key of the slotId received
    $slotFoundKey = null;
    foreach ($slots as $key => $slot) {
        if ($slot['id'] === $slotId) {
            $slotFoundKey = $key;
            break;
        }
    }
    return $slotFoundKey;
}

function updateSlots(array $slots) {
    // transform the array to string
    $fileContent = json_encode($slots);
    
    // write in the file
    file_put_contents(DB_SLOTS, $fileContent);
}
