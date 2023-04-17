<?php

$productName = 'T-shirt';

$productPrice = 20.25;

$productQuantity = 5;

/*
$description = 'We have ' . $productQuantity . ' of the product "' 
    . $productName . '" in our stock. Each item costs $' . $productPrice;
*/

$description = "We have $productQuantity of the product $productName in our stock. Each item costs \$$productPrice";

// note: double quotes or heredoc can be applied

echo $description;