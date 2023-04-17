<?php

declare(strict_types=1);

namespace TestSimpleShop\Repository;

use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;

final class ProductRepositoryFake implements ProductRepository
{
    private array $products = [];

    public function store(Product $product): void
    {
        $this->products[$product->name()] = $product;
    }

    public function findByName(string $name): ?Product
    {
        return $this->products[$name] ?? null;
    }
}
