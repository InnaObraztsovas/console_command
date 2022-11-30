<?php

declare(strict_types=1);

namespace App;

class Output
{
    public function view(string $command): void
    {
        echo $command.PHP_EOL;
    }
}
