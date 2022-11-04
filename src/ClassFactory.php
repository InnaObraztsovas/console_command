<?php
declare(strict_types=1);

namespace App;


use DirectoryIterator;
use Exception;
use ReflectionClass;
use ReflectionException;

/**
 *
 */
class ClassFactory
{
    /**
     * @param string $cls
     * @return Command
     * @throws ReflectionException
     * @throws Exception
     */
    function runClass(string $cls): Command
    {
        $classes = $this->getClassNames();
        foreach ($classes as $class) {
            $reflect = new ReflectionClass($class);
            $attribute = $this->getValue($reflect);
            if ($attribute == $cls) {
                $output = $reflect->getName();
                return new $output;
            }
        }
        throw new Exception('The command is not found');
    }


    private function getClassNames(): iterable
    {
        foreach (new DirectoryIterator(__DIR__) as $file) {
            if ($file->isFile()) {
                yield 'App\\' . $file->getBasename('.php');
            }
        }
    }

    /**
     * @param ReflectionClass $reflection
     * @return string
     * @throws Exception
     */
    private function getValue(ReflectionClass $reflection)
    {
        $attributes = $reflection->getAttributes(CommandAttribute::class);
        foreach ($attributes as $attribute) {
            $arguments = $attribute->getArguments();
            return $arguments['value'] ?? throw new \Exception('Not found');
        }
    }
}