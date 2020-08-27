<?php

declare(strict_types=1);

namespace mvc\Controllers;

use DateTime;

class Foo
{
    public function doSomething()
    {
        echo "Hi Foo!\n";

        $dt = new DateTime();
        echo $dt->getTimestamp();
    }
}
