<?php

declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Service\View;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\ControllerProvider;


require_once __DIR__ . '/vendor/autoload.php';


$productRepository = new ProductRepository();
$container = new Container();
$container->set(View::class, new View());

$controller = new ControllerProvider();
$page = null;
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}


$controllerList = $controller->getList();

foreach ($controllerList as $controller) {
    if (strtolower($controller::ROUTE) === $page) {
        $controller = new $controller($container, $productRepository);

        $controller->action();
    }
}

$view = $container->get(View::class);
$view->display();


