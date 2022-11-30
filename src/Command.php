<?php

declare(strict_types=1);

namespace App;

/**
 *
 */
interface Command
{
    public function start(Output $output): int;
}
