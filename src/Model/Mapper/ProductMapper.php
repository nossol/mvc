<?php declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\Dto\ProductDataTransferObject;


class ProductMapper
{
    /**
     * @param array $product
     * @return ProductDataTransferObject
     */
    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product['id']);
        $productDataTransferObject->setName($product['productname']);
        $productDataTransferObject->setDescription($product['description']);

        return $productDataTransferObject;
    }
}