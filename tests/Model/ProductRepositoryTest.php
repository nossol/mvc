<?php

namespace AppTest\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Mapper\ProductMapper;
use App\Model\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    public function testGetHasDto(): void
    {
        $productRepository = new ProductRepository();
        $id = 3;

        $object = $productRepository->get($id);

        self::assertInstanceOf(ProductDataTransferObject::class, $object);
        self::assertSame($id, $object->getId());
        // TODO: getName
        // TODO: getDescription
    }

    public function testGetWhenProductNotFound(): void
    {
        $productRepository = new ProductRepository();
        $id = 9999;

        $object = $productRepository->get($id);

        self::assertNull($object);
    }
}
