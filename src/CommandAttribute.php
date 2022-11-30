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
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
