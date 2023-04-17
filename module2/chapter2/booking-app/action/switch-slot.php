<?php

require_once __DIR__ . '/../modules/slots-storage.php';

$slotId = $_GET['id'];

switchStatus($slotId);

echo 'Slot updated! :D';
echo <<<HTML
<meta http-equiv="refresh" content="2; url='/admin.php'" />
HTML;
