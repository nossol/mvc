<?php

namespace App\Model;


use App\Model\Dto\ProductDataTransferObject;
use App\Model\Mapper\ProductMapper;

class ProductRepository
{
    /**
     * @var ProductDataTransferObject []   //nowdoc
     */
    private array $decodedProductList;
    private ProductMapper $productMapper;

    public function __construct()
    {
        $url = dirname(__DIR__, 2) . '/model.json';
        $data = file_get_contents($url);
        $decodedProductList = json_decode($data, true);
        $productMapper = new ProductMapper();

        $this->productMapper = $productMapper;

        foreach ($decodedProductList as $product) {
            $this->decodedProductList[(int)$product['id']] = $this->productMapper->map($product);
        }
    }

    public function getList(): array
    {
        return $this->decodedProductList;
    }

    public function get(int $id): ProductDataTransferObject
    {
        foreach ($this->decodedProductList as $object) {
            if ($id === $object->getId()) {
                return $object;
            }
        }
    }

    public function hasProduct(int $id): bool
    {
        foreach ($this->decodedProductList as $object) {

            if ($id === $object->getId()) {
                return true;
            }
        }
        return false;
    }
}
