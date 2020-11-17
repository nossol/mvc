<?php

declare(strict_types=1);

namespace App\Model;


class ProductRepository
{
    public function getList(): array
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

//blaaagfdhcxgb