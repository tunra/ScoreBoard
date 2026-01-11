<?php

namespace App;

class Game
{
    private(set) Team $homeTeam;
    private(set) Team $awayTeam;

    public function __construct(Team $homeTeam, Team $awayTeam)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
    }
}
