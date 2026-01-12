<?php

namespace App;

class Team
{
    private(set) string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
