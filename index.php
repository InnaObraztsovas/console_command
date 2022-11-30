<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use App\ClassFactory;
use App\Output;


/**
 *
 */
final class Application
{
    /**
     * @throws ReflectionException
     * @param array <string> $input
     */


    public function run(array $input): int
    {
        $command = new ClassFactory();
        $class = $command->runClass($input[1]);
        try {
            $class->start(new Output());
        }catch (Throwable $e){
           echo 'The command is not found';
        }
        return 0;
    }

}

    exit((new Application())->run($argv));

