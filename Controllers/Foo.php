<?php

declare(strict_types=1);

namespace mvc\Controllers;

use DateTime;

class Foo
{
    public function doSomething()
    {
        echo nl2br("Hi Foo!\n");

        $dt = new DateTime();
        echo nl2br($dt->getTimestamp()."\n");
    }
}
