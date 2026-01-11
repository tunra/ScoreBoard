<?php

namespace App\Tests;

use App\Game;
use App\ScoreBoard;
use App\Team;

class ScoreBoardTest extends \PHPUnit\Framework\TestCase
{
    public function testStartGameScore()
    {
        $scoreBoard = new ScoreBoard();

        $team1 = new Team();
        $team2 = new Team();
        $game = new Game($team1, $team2);

        dd($game->awayTeam);

        $scoreBoard->startGame();
    }
}
