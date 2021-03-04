<?php


namespace App\Service;

use App\Controller\Home;
use App\Controller\About;
use App\Controller\Products;
use App\Controller\ProductDetails;
use App\Controller\Error;

class ControllerProvider
{
    /**
     * @return string[]
     */
    public function getList(): array
    {
        return [
            Home::class,
            About::class,
            Products::class,
            ProductDetails::class,
            Error::class,
        ];
    }
}

