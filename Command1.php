<?php

class Command1 implements Command
{

    public function start(Output $output): int
    {
        $output->view('One');
        return 0;
        // TODO: Implement start() method.
    }
}