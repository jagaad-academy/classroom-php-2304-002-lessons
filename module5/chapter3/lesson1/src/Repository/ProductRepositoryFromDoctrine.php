<?php

declare(strict_types=1);

namespace SimpleShop\Repository;

use Doctrine\ORM\EntityManager;
use SimpleShop\Model\Product;

final class ProductRepositoryFromDoctrine implements ProductRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function store(Product $product): void
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function findByName(string $name): ?Product
    {
        return $this
            ->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['name' => $name]);
    }
}
