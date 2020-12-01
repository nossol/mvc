<?php

namespace App\Model;


class ProductRepository
{
    public function getProductList(): array
    {
        $productJson = file_get_contents('model.json');

        $decodedProductList = json_decode($productJson, true);

        return $decodedProductList;
    }

    public function getProduct()
    {

    }

    public function hasProduct()
    {

    }
}
