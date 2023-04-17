<?php

$company = 'Jagaad';

$name = 'Lucas, ' . $company;

// single quote example
//echo 'hello $name \nTest';

// duble quotes
//echo "hello \"$name\" \nTest";

// heredoc syntax
/*
echo <<<HTML
"my content"
$name
HTML;
*/

// nowdoc syntax
/*echo <<<'HTML'
"my content"
$name
HTML;*/

$myVar = <<<'HTML'
"my content"
$name
HTML;

echo $myVar . 'something else';
