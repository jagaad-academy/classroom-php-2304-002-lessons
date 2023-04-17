<?php

// we're back at H:13! :)

require_once __DIR__ . '/Cart.php';
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Order.php';

// @todo create terminal display object

/*
echo <<<OUTPUT
1: Continue shopping
2: Go to the checkout
3: Quit\n
OUTPUT;
*/

$products = [
    new Product('Laptop Linux', 1000),
    new Product('Keyboard', 50),
    new Product('Mouse', 100),
    new Product('Monitor', 500),
];

$ls = "\n-------------\n";
$productsOutput = "{$ls}Product list: \n";
foreach ($products as $key => $product) {
    $productsOutput .= $key . ': ' . $product->name() . ' $' . $product->price() . PHP_EOL;
}
$productsOutput .= "{$ls}Q: To quit\nL: List cart products\n\n";

$cart = new Cart;

while (true) {
    echo $productsOutput; 
    echo '> Cart products: ' . count($cart->products()) . PHP_EOL;

    $option = readline('Choose a product: ');

    if ($option === 'Q') {
        break;
    }

    if ($option === 'L') {
        system('clear');

        echo "{$ls}Cart products:\n";
        foreach ($cart->products() as $key => $product) {
            echo $key . ': ' . $product->name() . ' $' . $product->price() . PHP_EOL;
        }
        readline('Enter to continue: ');

        system('clear');
        continue;
    }

    if (! is_numeric($option)) {
        system('clear');
        echo "\nTry again...\n";
        continue;
    }

    $option = (int)$option;
    if (isset($products[$option])) {
        $selectedProduct = $products[$option];

        $cart->add($selectedProduct);

        system('clear');
        echo "{$ls}> Product {$selectedProduct->name()} added to the cart!{$ls}";
    }
}

system('clear');
echo $ls;

// @todo reuse this code
foreach ($cart->products() as $key => $product) {
    echo $key . ': ' . $product->name() . ' $' . $product->price() . PHP_EOL;
}

$order = new Order($cart);
echo 'Total: $' . $order->total() . PHP_EOL;

$inputAmount = (float)readline('Your payment amount: $');

echo $ls;

echo 'Order completed! :)' . PHP_EOL;
echo "Your payment is: $ {$inputAmount}" . PHP_EOL;
echo 'Your change amount is: $ ' . $order->pay($inputAmount);
