<?php

declare(strict_types=1);

namespace QualityToolsExample;

final class Cart
{
    /** @var string[] */
    private array $products = array();

    public function addProduct(string $product): void
    {
        $this->products[] = $product;
    }

    /**
     * @return string[]
     */
    public function products(): array
    {
        return $this->products;
    }
}
