<?php

declare(strict_types=1);

namespace SimpleShop\Model;

use ArrayIterator;

final class Cart
{
    private ArrayIterator $products;
    private ArrayIterator $quantities;

    public function __construct()
    {
        $this->products = new ArrayIterator;
        $this->quantities = new ArrayIterator;
    }

    public function add(Product $product, int $quantity): self
    {
        $this->products->append($product);
        $this->quantities->offsetSet($product->id, $quantity);
        return $this;
    }

    public function productQuantity(Product $product): int
    {
        return $this->quantities->offsetExists($product->id)
            ? $this->quantities->offsetGet($product->id)
            : 0;
    }

    public function quantity(): int
    {
        $total = 0;
        foreach ($this->quantities as $quantity) {
            $total += $quantity;
        }
        return $total;
    }
}
