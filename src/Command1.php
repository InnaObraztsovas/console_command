<?php
declare(strict_types=1);

namespace App;
/**
 *
 */
class Command1 implements Command
{
    public $open;

    public function start(Output $output): int
    {
        $output->view('One');
        return 0;
        // TODO: Implement start() method.
    }


}