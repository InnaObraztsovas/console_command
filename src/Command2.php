<?php

declare(strict_types=1);

namespace App;

/**
 *
 */
#[CommandAttribute(value: 'close')]
class Command2 implements Command
{
    public function start(Output $output): int
    {
        $output->view('Two');
        return 0;
        // TODO: Implement start() method.
    }
}
