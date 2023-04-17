<?php

declare(strict_types=1);

namespace SimpleShop\Service;

use DomainException;
use Ramsey\Uuid\Uuid;
use SimpleShop\Exception\DuplicatedProductException;
use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;

final class CreateProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function create(array $params): Product
    {
        $name = $params['name'] ?? null;

        if ($this->repository->findByName($name) !== null) {
            throw DuplicatedProductException::fromName($name);
        }

        $product = new Product(Uuid::uuid4(), $params['name']);
        $this->repository->store($product);

        return $product;
    }
}
