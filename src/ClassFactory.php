<?php
declare(strict_types=1);

namespace App;

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
    function getClassName($cls)
    {
        $class = new ReflectionClass($cls);
        if ( $class->implementsInterface('Command') ) {
            return new $cls;
        }
        return false;
    }
}