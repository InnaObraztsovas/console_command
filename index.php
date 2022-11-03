<?php
declare(strict_types=1);
require 'Command.php';
require_once 'Command1.php';
require_once 'Command2.php';
require_once 'Output.php';
require_once 'ClassFactory.php';


/**
 *
 */
final class Aplication
{
    public function run(array $input): int
    {

        $command = new ClassFactory();
        $class = $command->getClassName($input[1]);
        $class->start(new Output());

        return 0;
    }

}

exit((new Aplication())->run($argv));
