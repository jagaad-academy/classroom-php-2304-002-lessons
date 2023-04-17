<?php

declare(strict_types=1);

namespace SimpleShop\Model;

use ArrayIterator;
use DomainException;

final class Cart
{
    private ArrayIterator $products;
    private ArrayIterator $quantities;

    public function __construct()
    {
        $this->products = new ArrayIterator;
        $this->quantities = new ArrayIterator;
    }

    public function set(Product $product, int $quantity): self
    {
        if ($quantity <= 0) {
            throw new DomainException('quantity can not be zero or negative');
        }

        $this->products->offsetSet($product->id()->toString(), $product);
        $this->quantities->offsetSet($product->id()->toString(), $quantity);
        return $this;
    }

    public function remove(Product $product): void
    {
        $this->products->offsetUnset($product->id()->toString());
        $this->quantities->offsetUnset($product->id()->toString());
    }

    public function productQuantity(Product $product): int
    {
        return $this->quantities->offsetExists($product->id()->toString())
            ? $this->quantities->offsetGet($product->id()->toString())
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

    public function products(): ArrayIterator
    {
        return $this->products;
    }
}
