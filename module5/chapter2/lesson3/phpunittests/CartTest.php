<?php
/**
 * CartTest.php
 * hennadii.shvedko
 * 22.09.2023
 */

declare(strict_types=1);

use HennadiiShvedko\Lesson3\Cart;
use HennadiiShvedko\Lesson3\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testCreateACartInstance(): void
    {
        $cart = new Cart;
        $this->assertInstanceOf('HennadiiShvedko\Lesson3\Cart', $cart);
    }

    public function testAmountOfCartIsZero(): void
    {
        $cart = new Cart;
        $this->assertEquals(0, $cart->getQnt());
    }

    public function testAddToCart(): void
    {
        $cart = new Cart;
        $cart->addProduct(new Product('keyboard'));

        $this->assertEquals(1, $cart->getQnt());
    }

    public function testDeleteFromCart():void
    {
        $cart = new Cart();
        $product1 = new Product('mouse');
        $product2 = new Product('chair');
        $cart->addProduct($product1);
        $cart->addProduct($product2);

        $this->assertEquals(2, $cart->getQnt());

        $cart->removeProduct($product1);

        $this->assertEquals(1, $cart->getQnt());
    }
}
