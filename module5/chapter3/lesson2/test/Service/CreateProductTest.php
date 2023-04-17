<?php

declare(strict_types=1);

namespace TestSimpleShop\Service;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use SimpleShop\Exception\DuplicatedProductException;
use SimpleShop\Model\Product;
use SimpleShop\Service\CreateProduct;
use TestSimpleShop\Logger\LoggerFake;
use TestSimpleShop\Repository\ProductRepositoryFake;

final class CreateProductTest extends TestCase
{
    public function testInstanceShouldWork(): void
    {
        $repository = new ProductRepositoryFake();
        $logger = new LoggerFake();

        $object = new CreateProduct($repository, $logger);
        self::assertTrue((bool)$object);
    }

    public function testStoreShouldWork(): void
    {
        $repository = new ProductRepositoryFake();
        $logger = new LoggerFake();

        $object = new CreateProduct($repository, $logger);

        $params = ['name' => 'test'];
        $object->create($params);

        $product = $repository->findByName($params['name']);

        self::assertNotNull($product);
    }

    public function testStoreShouldThrowExceptionWhenProductIsDuplicated(): void
    {
        $this->expectException(DuplicatedProductException::class);

        $repository = new ProductRepositoryFake();
        $logger = new LoggerFake();

        $object = new CreateProduct($repository, $logger);

        $params = ['name' => 'test'];

        $repository->store(new Product(Uuid::uuid4(), $params['name']));

        $object->create($params);
    }
}
