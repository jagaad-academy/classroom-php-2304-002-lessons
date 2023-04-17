<?php

// fetch the data from the API as string
$companiesStr = file_get_contents('https://api.generadordni.es/v2/profiles/company?results=10');

// transform the data from string to array
$companies = json_decode($companiesStr, true);

foreach ($companies as $company) {
    echo $company['cif'] . ' | ' . $company['name'] . ' | ' . $company['address'] . PHP_EOL;
}

