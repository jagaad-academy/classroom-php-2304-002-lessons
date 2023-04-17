<?php

declare(strict_types=1);

namespace TestSimpleShop\Model;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
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

    public function testSetProductShouldWork(): void
    {
        $cart = new Cart;

        self::assertEquals(0, $cart->quantity());

        $keyboard = new Product(Uuid::uuid4(), 'Keyboard');

        $cart->set($keyboard, 1);
        $cart->set($keyboard, 1);

        self::assertEquals(1, $cart->quantity());
        self::assertEquals(1, $cart->products()->count());

        $cart
            ->set(new Product(Uuid::uuid4(), 'Mouse'), 2)
            ->set(new Product(Uuid::uuid4(), 'Monitor'), 1);

        self::assertEquals(4, $cart->quantity());
    }

    /**
     * @dataProvider invalidQuantitiesDataProvider
     */
    public function testSetProductShouldThrowExceptionWhenQuantityIsZeroOrNegative($quantity): void
    {
        $this->expectException(\DomainException::class);

        $product = new Product(Uuid::uuid4(), 'Keyboard');
        $cart = new Cart;
        $cart->set($product, $quantity);
    }

    private function invalidQuantitiesDataProvider(): array
    {
        return [
            'zero' => [ 0 ], // first call test arguments
            'negative -1' => [ -1 ], // 2nd call test arguments
            'negative -100' =>[ -100 ], // 3rd call test arguments
            'negative -10' =>[ -40 ], // 4th call test arguments
        ];
    }

    public function testQuantityByProductShouldWork(): void
    {
        $cart = new Cart;

        $keyboard = new Product(Uuid::uuid4(), 'Keyboard');

        self::assertEquals(0, $cart->productQuantity($keyboard), 'Product quantity should start zero');

        $cart->set($keyboard, 5);

        self::assertEquals(5, $cart->productQuantity($keyboard), 'Product quantity should be updated correctly');
    }

    public function testRemoveProductShouldWork(): void
    {
        $cart = new Cart;

        $cart->remove(new Product(Uuid::uuid4(), 'Test Remove'));

        $keyboard = new Product(Uuid::uuid4(), 'Keyboard');
        $mouse = new Product(Uuid::uuid4(), 'Mouse');

        $cart->set($keyboard, 2);
        $cart->set($mouse, 1);

        self::assertEquals(2, $cart->productQuantity($keyboard));
        self::assertEquals(1, $cart->productQuantity($mouse));
        self::assertEquals(3, $cart->quantity());

        $cart->remove($keyboard);

        self::assertEquals(0, $cart->productQuantity($keyboard));
        self::assertEquals(1, $cart->productQuantity($mouse));
        self::assertEquals(1, $cart->quantity());

        $cart->remove($mouse);

        self::assertEquals(0, $cart->productQuantity($keyboard));
        self::assertEquals(0, $cart->productQuantity($mouse));
        self::assertEquals(0, $cart->quantity());
    }
}
