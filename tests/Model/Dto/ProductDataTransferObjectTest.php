<?php

namespace AppTest\Model\Dto;

use App\Model\Dto\ProductDataTransferObject;
use PHPUnit\Framework\TestCase;

class ProductDataTransferObjectTest extends TestCase
{
    public function testInitialisation(): void
    {
        $module = new ProductDataTransferObject();

        self::assertSame(0, $module->getId());
        self::assertEmpty($module->getName());
        self::assertEmpty($module->getDescription());
    }
}
