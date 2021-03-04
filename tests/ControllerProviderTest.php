<?php


namespace AppTest;

use App\Service\ControllerProvider;
use PHPUnit\Framework\TestCase;

class ControllerProviderTest extends TestCase
{
    public function testArrayOfClasses(): void
    {
        $controllerArray = new ControllerProvider();
        $controller = $controllerArray->getList();
        self::assertIsArray($controller);
        self::assertCount(5, $controller);
    }
}
