<?php declare(strict_types=1);


namespace App\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Mapper\ProductMapper;


class ProductRepository
{
    private array $decodedProductList;

    /**
     * ProductRepository constructor.
     */
    public function __construct()
    {
        $url = dirname(__DIR__, 2) . '/model.json';
        $data = file_get_contents($url);
        $decodedProductList = json_decode($data, true);
        $productMapper = new ProductMapper();

        foreach ($decodedProductList as $product) {
            $this->decodedProductList[(int)$product['id']] = $productMapper->map($product);
        }
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->decodedProductList;
    }

    /**
     * @param int $id
     * @return ProductDataTransferObject|null
     */
    public function get(int $id): ?ProductDataTransferObject
    {
        foreach ($this->decodedProductList as $object) {
            if ($id === $object->getId()) {
                return $object;
            }
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
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
