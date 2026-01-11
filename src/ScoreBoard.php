<?php

namespace App;

class ScoreBoard
{
    private(set) array $games = [];

    public function startGame(Game $game)
    {
        $this->games[] = $game;
    }

    public function finishGame(Game $game)
    {
        
    }

    public function updateScore()
    {

    }

    public function summary()
    {

    }
}
