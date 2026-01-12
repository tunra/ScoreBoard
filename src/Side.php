<?php

namespace App;

class Side
{
    private(set) Team $team;
    private(set) int $score = 0;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
