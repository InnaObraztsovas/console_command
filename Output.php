<?php

class Output
{

    public function view(string $command): void
    {
        echo $command.PHP_EOL;
    }
}