<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Shop\Cart;
use Jagaad\Shop\Product;

abstract class ProductOption
{
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function addProduct(Product $product): void
    {
        $this->cart->add($product);

        system('clear');

        echo 'Product "' . $product->name() . '" added to the cart' . PHP_EOL;
    }
}
