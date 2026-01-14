<?php

namespace App\ScoreBoard;

class ScoreBoard
{
    /**
     * @var Game[]
     */
    private(set) array $games = [];

    public function startGame(string $home, string $away): Game
    {
        // @todo use array_find() ?
        // No Team should be a duplicate.
        foreach ($this->games as $game) {
            $teams = [$game->home->team->name, $game->away->team->name];
            if (in_array($home, $teams)) {
                throw new \InvalidArgumentException("Team {$home} already exists.");
            } elseif (in_array($away, $teams)) {
                throw new \InvalidArgumentException("Team {$away} already exists.");
            }
        }

        $game = Game::createGame($home, $away);
        $this->games[$game->id] = $game;

        return $game;
    }

    public function finishGame(Game $game): void
    {
        if (!isset($this->games[$game->id])) {
            throw new \InvalidArgumentException('Game not found');
        }

        unset($this->games[$game->id]);
    }

    public function updateScore(Game $game, int $homeScore = 0, int $awayScore = 0): void
    {
        if (!isset($this->games[$game->id])) {
            throw new \InvalidArgumentException('Game not found');
        }

        $game->setScore($homeScore, $awayScore);
    }

    /**
     * @todo sort by order in Game
     * @return Game[]
     */
    public function summary(): array
    {
        $games = $this->games;

        uasort($games, function (Game $a, Game $b) {
            if ($b->total === $a->total) {
                return 1;
            }
            return $b->total < $a->total ? -1 : 1;
        });

        return $games;
    }
}
