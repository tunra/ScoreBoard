<?php

namespace App;

class Side
{
    private(set) Team $team;
    public int $score = 0 {
        get {
            return $this->score;
        }
        set(int $score) {
            if ($score < 0) {
                throw new \InvalidArgumentException('Score cannot be negative.');
            }
            $this->score = $score;
        }
    }

    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
