<?php

namespace App\Model;


class ProductRepository
{
    private array $productList;


    public function getProductList(): array
    {
        $productJson = file_get_contents('model.json');

        $decodedProductList = json_decode($productJson, true);

        return $decodedProductList;
    }

    public function getProduct($id)
    {

    }

    public function hasProduct()
    {

    }
}
