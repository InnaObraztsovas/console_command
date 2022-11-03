<?php
declare(strict_types=1);

namespace App;

require_once 'Command.php';

use DirectoryIterator;
use ReflectionClass;

/**
 *
 */
class ClassFactory
{
    /**
     * @param $cls
     * @return false|mixed
     * @throws \ReflectionException
     */
    function runClass(string $cls)
    {
        $classes = $this->getClassNames();
        foreach ($classes as $class) {
            $reflect = new ReflectionClass($class);
            if ($reflect->hasProperty($cls)) {
                $output = $reflect->getName();
                return new $output;
            }
        }
        return false;
    }

    private function getClassNames(): array
    {
        $classes = [];
        foreach (new DirectoryIterator(__DIR__) as $file) {
            if ($file->isFile()) {
                $classes[] = 'App\\' . $file->getBasename('.php');
            }
        }
        return $classes;
    }
}