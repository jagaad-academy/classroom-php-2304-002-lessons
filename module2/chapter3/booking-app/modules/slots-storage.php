<?php

require_once __DIR__ . '/connection.php';

define('DB_SLOTS', __DIR__ . '/../db/db_slots.json');

function getSlots_DEPRECATED() {
    $slots = [];
    // read the filesystem slots
    if (file_exists(DB_SLOTS)) {
        $fileContent = file_get_contents(DB_SLOTS);
        // transform it from string to array
        $slots = json_decode($fileContent, true, 512, JSON_THROW_ON_ERROR);
    }
    return $slots;
}

function getSlots() {
    // 1. connect the DB
    $mysqli = connect();

    // 3. build the SQL query
    $sql = 'SELECT id, name, description, booked FROM slots ORDER BY name';

    // 4. execute the query
    $result = $mysqli->query($sql);

    // 5. fetch the result
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addSlot_DEPRECATED(array $slot) {
    $slots = getSlots();

    // append the new slot
    $slots[] = $slot;

    updateSlots($slots);

    return $slots;
}

function addSlot(array $slot) {
    $mysqli = connect();
    
    // @todo convert to use prepared statement
    $sql = <<<SQL
        INSERT INTO slots (id, name, description, booked, created_by, created_at)
        VALUES (
            '$slot[id]',
            '$slot[name]',
            '$slot[description]',
            $slot[booked],
            $slot[created_by],
            '$slot[created_at]'
        )
    SQL;

    $mysqli->query($sql);

    return getSlots();
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

function deleteSlot_DEPRECATED(string $slotId) {
    $slots = getSlots();

    // find the array key of the slotId received
    $slotFoundKey = getArrayKeyBySlotId($slots, $slotId);
    
    // delete array item by key
    unset($slots[$slotFoundKey]);
    
    updateSlots($slots);

    return $slots;
}

function deleteSlot(string $slotId) {
    $mysqli = connect();
    
    $sql = 'DELETE FROM slots WHERE id = ?';
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $slotId);
    $stmt->execute();

    return getSlots();
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
