<?php

namespace App;

class Game
{
    private(set) Side $home;
    private(set) Side $away;

    private(set) string $id;
    private(set) int $index;

    // @todo is this set private?
    public int $total {
        get {
            return $this->home->score + $this->away->score;
        }
        set {}
    }

    private function __construct(Team $homeTeam, Team $awayTeam, int $numberOfGames)
    {
        $this->home = new Side($homeTeam);
        $this->away = new Side($awayTeam);
        $this->index = $numberOfGames;

        $this->id = $homeTeam->name . ':' . $awayTeam->name;
    }

    public static function createGame(string $homeTeam, string $awayTeam, int $numberOfGames): Game
    {
        return new self(new Team($homeTeam), new Team($awayTeam), $numberOfGames);
    }

    public function setScore(int $homeScore, int $awayScore): void
    {
        $this->home->score = $homeScore;
        $this->away->score = $awayScore;
    }

    public function __toString(): string
    {
        return sprintf('%s %d : %s %d', $this->home->team->name, $this->home->score, $this->away->team->name, $this->away->score);
    }
}
