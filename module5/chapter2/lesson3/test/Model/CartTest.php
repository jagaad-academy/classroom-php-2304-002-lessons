<?php

declare(strict_types=1);

namespace TestSimpleShop\Model;

use PHPUnit\Framework\TestCase;
use SimpleShop\Model\Cart;
use SimpleShop\Model\Product;

final class CartTest extends TestCase
{
    public function testCartExist(): void
    {
        $cart = new Cart;
        self::assertInstanceOf(Cart::class, $cart);
    }

    public function testInitialQuantityShouldBeZero(): void
    {
        $cart = new Cart;
        self::assertEquals(0, $cart->quantity());
    }

    public function testAddProductShouldWork(): void
    {
        $cart = new Cart;

        self::assertEquals(0, $cart->quantity());

        $cart->add(new Product('Keyboard'), 1);

        self::assertEquals(1, $cart->quantity());

        $cart
            ->add(new Product('Mouse'), 2)
            ->add(new Product('Monitor'), 1);

        self::assertEquals(4, $cart->quantity());
    }

    public function testQuantityByProductShouldWork(): void
    {
        $cart = new Cart;

        $keyboard = new Product('Keyboard');

        self::assertEquals(0, $cart->productQuantity($keyboard), 'Product quantity should start zero');

        $cart->add($keyboard, 5);

        self::assertEquals(5, $cart->productQuantity($keyboard), 'Product quantity should be updated correctly');
    }
}
