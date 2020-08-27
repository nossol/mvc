<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Controllers\Foo;
use App\Controllers\Example;

$foo = new Foo();
$foo->doSomething();

$example = new Example();
$example->doSomethingElse();

