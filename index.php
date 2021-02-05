<?php

declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Controller\Error;
use App\Service\View;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\ControllerProvider;

require_once __DIR__ . '/vendor/autoload.php';


$productRepository = new ProductRepository();
$container = new Container();
$container->set(View::class, new View());

$controllerProvider = new ControllerProvider();
$page = 'home';
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}

$controllerList = $controllerProvider->getList();

foreach ($controllerList as $viewController) {
    if (strtolower($viewController::ROUTE) === $page) {
        $controller = new $viewController($container, $productRepository);
        $controller->action();
    }
}

if (!isset($controller)) {
    $controller = new Error($container);
    $controller->action();
}

$view = $container->get(View::class);
$view->display();


