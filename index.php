<?php declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Service\View;
use App\Service\Container;
use App\Service\ControllerProvider;
use App\Service\DependencyProvider;
use App\Controller\Frontend\Error;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();
$containerProvider = new DependencyProvider();
$containerProvider->provideDependency($container);

$controller = new ControllerProvider();
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
$isAdmin = (!empty($_GET['admin']) && $_GET['admin'] === 'true');

if ($isAdmin) {
    $controllerList = $controller->getBackendList();
} else {
    $controllerList = $controller->getFrontendList();
}

$isFound = false;

foreach ($controllerList as $controller) {
    if (strtolower($controller::ROUTE) === $page) {
        $isFound = true;
        $controller = new $controller($container);
        if ($isAdmin) {
            $isFound = true;
            $controller = new $controller($container);
            $controller->init();
        }
        $controller->action();
    }
}

if (!$isFound) {
    $controller = new Error($container);
    $controller->action();
}

$view = $container->get(View::class);
$view->display();


