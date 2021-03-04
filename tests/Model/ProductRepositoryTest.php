<?php

namespace AppTest\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Mapper\ProductMapper;
use App\Model\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    private array $decodedProductList;

    public function testGetHasDto(): void
    {
        $productRepository = new ProductRepository();
        $id = 3;

        $object = $productRepository->get($id);

        self::assertInstanceOf(ProductDataTransferObject::class, $object);
        self::assertSame($id, $object->getId());
    }

    public function testGetHasNoDto(): void
    {
        $productRepository = new ProductRepository();
        $id = 9999;

        $object = $productRepository->get($id);

        self::assertNull($object);
    }

    public function test__construct(): void
    {
        $url = dirname(__DIR__, 2) . '/model.json';
        $data = file_get_contents($url);
        $decodedProductList = json_decode($data, true);
        $productMapper = new ProductMapper();

        foreach ($decodedProductList as $product) {
            $this->decodedProductList[(int)$product['id']] = $productMapper->map($product);
        }

        self::assertJsonStringEqualsJsonFile(
            '/home/developer/mvc-master/model.json', json_encode($decodedProductList)
        );
    }
}
