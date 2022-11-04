<?php
declare(strict_types=1);

namespace App;


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
            $attribute = $this->getValue($reflect);
            if ($attribute == $cls) {
                $output = $reflect->getName();
                return new $output;
            }
        }
        return new \Exception('The command is not found');
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
     * @param $reflection
     * @param $class
     * @return mixed|void
     */
    private function getValue($reflection)
    {
        $attributes = $reflection->getAttributes();
        foreach ($attributes as $attribute) {
            $arguments = $attribute->getArguments();
            return $arguments['value'] ?? new \Exception('Not found');
        }
    }
}