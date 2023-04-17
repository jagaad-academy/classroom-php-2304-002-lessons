<?php

/*
Changin the file again!

Write a script to write multiple lines in a text file.

Test Data :
Input the number of lines to be written: 3

:: The lines are ::
test line 1
test line 2
asdasdasd

Expected Output :
The content of the file test.txt is:                                                                       
test line 1                                                                                                   
test line 2
asdasdasd
*/

/* SOLUTION 1
$filename = 'test.txt';

$numberLines = readline('Input the number of lines to be written: ');
$text = '';

while ($numberLines > 0) {
    $text .= readline('Enter your data: ') . PHP_EOL;
    $numberLines--;
}

file_put_contents($filename, $text);

echo file_get_contents($filename);
*/

$filename = 'test.txt';

unlink($filename); // delete the file

$numberLines = readline('Input the number of lines to be written: ');
$text = '';

echo ":: The lines are ::\n";
while ($numberLines > 0) {
    takeAndWriteOneLine($filename);
    $numberLines--;
}

echo "The content of the file $filename is:  \n";
echo file_get_contents($filename);

function takeAndWriteOneLine($filename) {
    $text = readline('Type something: ') . PHP_EOL;
    file_put_contents($filename, $text, FILE_APPEND);
}
