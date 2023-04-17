<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
    //echo $class_name;
    //die;
    //include $class_name . '.php';
});

$obj  = new Car();

// shop/checkout/Cart.php

// Shop_Checkout_Cart.php