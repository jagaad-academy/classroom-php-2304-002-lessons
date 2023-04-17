<?php

declare(strict_types=1);

namespace SimpleShop\Service;

use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;
use SimpleShop\Exception\DuplicatedProductException;
use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;
use SimpleShop\Validator\CreateProductValidator;

final class CreateProduct
{
    public function __construct(
        private ProductRepository $repository,
        private LoggerInterface $logger,
    ) {}

    public function create(array $params): Product
    {
        CreateProductValidator::validate($params);

        $name = $params['name'] ?? null;

        if ($this->repository->findByName($name) !== null) {
            throw DuplicatedProductException::fromName($name);
        }

        $product = new Product(Uuid::uuid4(), $params['name']);
        $this->repository->store($product);

        $this->logger->info("product {$product->name()} successfully created :)");

        return $product;
    }
}
