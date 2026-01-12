<?php

namespace App;

class Game
{
    private(set) Side $home;
    private(set) Side $away;

    private(set) string $id;
    private(set) int $index;

    private function __construct(Team $homeTeam, Team $awayTeam, int $numberOfGames)
    {
        $this->home = new Side($homeTeam);
        $this->away = new Side($awayTeam);
        $this->index = $numberOfGames;

        $this->id = $homeTeam->name . ':' . $awayTeam->name;
    }

    public static function createGame(Team $homeTeam, Team $awayTeam, int $numberOfGames): Game
    {
        return new self($homeTeam, $awayTeam, $numberOfGames);
    }

    public function updateScore()
    {
    }

    public function __toString(): string
    {
        return sprintf('%s %d : %s %d', $this->home->team->name, $this->home->score, $this->away->team->name, $this->away->score);
    }
}
