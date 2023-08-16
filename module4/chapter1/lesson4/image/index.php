<?php

require_once "vendor/autoload.php";

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

// configure with favored image driver (gd by default)
$image = Image::make('public/foo.png')->resize(300, 200)->save("public/test.jpg");
