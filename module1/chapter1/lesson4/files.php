<?php

//$file = fopen("https://www.php.net/manual/en/wrappers.file.php", "r");

// Output lines until EOF is reached
//while(! feof($file)) {
//    $line = fgets($file);
//    echo $line. PHP_EOL;
//}
//
//fclose($file);

$filename = '../myfile1.txt';
//$somecontent = "Add this to the file\n";
//
//if (!is_writable($filename)){
//    echo "The file $filename is not writable";
//} else {
//    $fp = fopen($filename, 'a');
//    fwrite($fp, $somecontent);
//    fclose($fp);
//}
//
//$file = fopen($filename, "r");
//
//while(! feof($file)) {
//    $line = fgets($file);
//    echo $line. PHP_EOL;
//}
//
//fclose($file);

//$content = file_get_contents($filename);
//if($content === false){
//    echo "Error during reading the file!";
//} else {
//    echo $content;
//}

$newContent = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
$result = file_put_contents($filename, $newContent);
if($result === false){
    echo "Error during writing into file!";
}
