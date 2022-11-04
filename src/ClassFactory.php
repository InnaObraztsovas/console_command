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
     * @return ReflectionClass
     * @throws ReflectionException
     * @throws Exception
     */
    function runClass(string $cls): object
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

    /**
     * @param ReflectionClass $reflection
     * @return string
     * @throws Exception
     */
    private function getValue(ReflectionClass $reflection)
    {
        $attributes = $reflection->getAttributes();
        foreach ($attributes as $attribute) {
            $arguments = $attribute->getArguments();
            return $arguments['value'] ?? throw new \Exception('Not found');
        }
    }
}