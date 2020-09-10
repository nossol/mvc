<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'src/core/Bootstrap.php';

require Router::load('Routes.php')
    ->direct(Request::uri());




