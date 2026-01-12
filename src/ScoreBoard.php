<?php

namespace App;

class ScoreBoard
{
    /**
     * @var Game[]
     */
    private(set) array $games = [];

    public function startGame(string $home, string $away): Game
    {
        $game = Game::createGame(new Team($home), new Team($away), count($this->games) + 1);
        $this->games[$game->id] = $game;

        return $game;
    }

    public function finishGame(Game $game)
    {
        unset($this->games[$game->id]);
    }

    public function updateScore()
    {

    }

    public function summary()
    {

    }
}
