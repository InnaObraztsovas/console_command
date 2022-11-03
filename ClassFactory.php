<?php

/**
 *
 */
class ClassFactory
{

    /**
     * @throws ReflectionException
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