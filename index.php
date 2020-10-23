<?php

declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Core\{Router, Request};

require 'vendor/autoload.php';
require 'src/core/Bootstrap.php';


$routerLoad = Router::load('src/core/Routes.php')
    ->direct(Request::uri());

$routerAction = new $routerLoad;

$routerAction->action();






