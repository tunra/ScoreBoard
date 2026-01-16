<?php

namespace App\ScoreBoard;

class ScoreBoard
{
    /**
     * Array can be exposed because it can't be modified from outside
     * @var Game[]
     */
    private(set) array $games = [];

    public function startGame(string $home, string $away): Game
    {
        // No Team should be a duplicate.
        foreach (array_keys($this->games) as $id) {
            $id = strtoupper($id);
            if (str_contains($id, strtoupper($home)) || str_contains($id, strtoupper($away))) {
                throw new \InvalidArgumentException("Either '{$home}' or '{$away}' already exist in '{$id}'.");
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
     * Sorts games by total score, most recently added games come first in the summary.
     *
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
