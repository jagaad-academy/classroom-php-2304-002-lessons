<?php

$productName = 'T-shirt';

$productPrice = 20.25;

$productQuantity = 5;

$descriptionDoubleQuotes = "We have $productQuantity of the product $productName in our stock. Each item costs \$$productPrice";

$descriptionSingleQuotes = 'We have ' . $productQuantity . ' of the product "'
    . $productName . '" in our stock. Each item costs $' . $productPrice;


echo $descriptionDoubleQuotes;
