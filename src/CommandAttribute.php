<?php

namespace App;

/**
 *
 */
#[\Attribute]
class CommandAttribute
{
    public string $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

}