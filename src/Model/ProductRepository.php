<?php

namespace App\Model;


class ProductRepository
{
    private array $decodedProductList = [];

    public function getProductList(): array
    {
        $productJson = file_get_contents('model.json');

        $this->decodedProductList = json_decode($productJson, true);

        return $this->decodedProductList;
    }

    public function getProduct(): array
    {
        $id = (int) $_GET['pid'];

        if (!isset($_GET['pid'])) {
            throw new \Exception('No Product selected.');
        }

        foreach ($this->decodedProductList as $object) {
            if ($id === $object['id']) {
                return $object;
            }
        }
    }

    public function hasProduct(int $id): bool
    {
        foreach ($this->decodedProductList as $object) {
            if ($id === $object['id']) {
                return true;
            }
        }
        return false;
    }
}
