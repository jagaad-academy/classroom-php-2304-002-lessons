<?php

$mysqli = new mysqli('localhost', 'root', 'root', 'php_course');

// check connection
if ($mysqli->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
  exit;
}

$sql = 'SELECT task_id, name FROM tasks ORDER BY name;';
$result = $mysqli->query($sql);

$rows = $result->fetch_all(MYSQLI_ASSOC);

foreach ($rows as $row) {
    echo 'Task ID: ' . $row['task_id'] . ' - name: ' . $row['name'] . PHP_EOL;
    echo '-------------' . PHP_EOL;
}

$result->free_result();
$mysqli->close();
