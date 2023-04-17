<?php
/*
$file = fopen("myfile.txt", "r");

// Output lines until EOF is reached
while(! feof($file)) {
  $line = fgets($file);
  echo $line. "\n";
}

fclose($file);
*/

/*
$filename = 'test.txt';
$somecontent = "Add this to the fileasddddddddddddddddddddddddddddddddddddddddddddddddddddddd\n";

if (!is_writable($filename)){
    echo "The file $filename is not writable";
} else {
    $fp = fopen($filename, 'w+');
    fwrite($fp, $somecontent);
    fclose($fp);
}
*/

/*
$file = 'myfile.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new text to the file
$current .= "Add content to the file\n";
// Write the contents back to the file
file_put_contents($file, $current);
*/

/*
$content = file_get_contents('myfile.txt');

echo $content;
*/

//$content = 'blablabla';

//file_put_contents('anotherfile.txt', $content);

