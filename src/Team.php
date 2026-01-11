<?php

namespace App;

class Team
{
    private(set) string $name;
    private(set) int $score = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
