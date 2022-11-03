<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use App\ClassFactory;
use App\Output;


/**
 *
 */
final class Aplication
{
    /**
     * @throws ReflectionException
     */
    public function run(array $input): int
    {
        $command = new ClassFactory();
        $class = $command->runClass($input[1]);
        $class->start(new Output());

        return 0;
    }

}

exit((new Aplication())->run($argv));
