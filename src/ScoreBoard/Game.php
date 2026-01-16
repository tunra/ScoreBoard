<?php

namespace App\ScoreBoard;


class Game
{
    private(set) Side $home;
    private(set) Side $away;

    private(set) string $id;

    private function __construct(Team $homeTeam, Team $awayTeam)
    {
        $this->home = new Side($homeTeam);
        $this->away = new Side($awayTeam);

        $this->id = $homeTeam->name . ':' . $awayTeam->name;
    }

    public static function createGame(string $homeTeam, string $awayTeam): Game
    {
        return new self(new Team($homeTeam), new Team($awayTeam));
    }

    public function setScore(int $homeScore, int $awayScore): void
    {
        $this->home->score = $homeScore;
        $this->away->score = $awayScore;
    }

    public function getTotal(): int
    {
        return $this->home->score + $this->away->score;
    }

    public function __toString(): string
    {
        return sprintf('%s %d : %s %d', $this->home->team->name, $this->home->score, $this->away->team->name, $this->away->score);
    }
}
