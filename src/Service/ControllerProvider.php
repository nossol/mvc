<?php declare(strict_types=1);


namespace App\Service;

use App\Controller\Backend\Dashboard;
use App\Controller\Frontend\Home;
use App\Controller\Frontend\About;
use App\Controller\Frontend\Products;
use App\Controller\Frontend\ProductDetails;
use App\Controller\Frontend\Error;
use App\Controller\Frontend\Users;
use App\Controller\Backend\Login;


class ControllerProvider
{
    /**
     * @return string[]
     */
    public function getFrontendList(): array
    {
        return [
            Home::class,
            About::class,
            Products::class,
            ProductDetails::class,
            Error::class,
            Users::class,
        ];
    }

    public function getBackendList(): array
    {
        return [
            Login::class,
            Dashboard::class,
        ];
    }
}

