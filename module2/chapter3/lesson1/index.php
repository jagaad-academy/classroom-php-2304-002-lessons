<?php

$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'jagaad_modlule2'
);

// check connection
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
    exit;
}

//$sql = 'SELECT * FROM test_command_table ORDER BY full_name';
//$result = $mysqli->query($sql);
//$row = $result->fetch_array(MYSQLI_ASSOC);

$rows = $result->fetch_all(MYSQLI_ASSOC);


$sql = 'UPDATE test_command_table SET="!!!" WHERE full_name="!!!"';
$statement = $mysqli->prepare($sql);
$statement->execute();





foreach ($rows as $row){
    echo 'Name: ' . $row["full_name"] . PHP_EOL;
    echo 'Birthday: ' . $row["birth_day"] . PHP_EOL;
}
$result->free_result();
$mysqli->close();

