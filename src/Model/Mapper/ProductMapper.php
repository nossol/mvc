<?php


namespace App\Model\Mapper;

use App\Model\Dto\ProductDataTransferObject;


class ProductMapper
{
    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product['id']);
        $productDataTransferObject->setName($product['productname']);
        $productDataTransferObject->setDescription($product['description']);

        return $productDataTransferObject;
    }
}