<?php declare(strict_types=1);


namespace App\Service;

use App\Controller\Backend\Dashboard;
use App\Service\View;
use App\Model\ProductRepository;
use App\Model\UserRepository;
use App\Service\SQLConnector;


class DependencyProvider
{
    /**
     * @param Container $container
     * @throws \Exception
     */
    public function provideDependency(Container $container):void
    {
        $container->set(View::class, new View());
        $container->set(ProductRepository::class, new ProductRepository());
        $container->set(SQLConnector::class, new SQLConnector());
        $container->set(UserRepository::class, new UserRepository($container->get(SQLConnector::class)));
        $container->set(SessionUser::class, new SessionUser());
    }
}