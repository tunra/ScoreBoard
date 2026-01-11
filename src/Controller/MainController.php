<?php

namespace App\Controller;

use App\Game;
use App\ScoreBoard;
use App\Team;
use Symfony\Component\Routing\Attribute\Route;

/**
 *
 */
class MainController
{
    #[Route('/')]
    public function index()
    {
        $scoreBoard = new ScoreBoard();

        $team1 = new Team('Team A');
        $team2 = new Team('Team B');
        $game = new Game($team1, $team2);
        $game2 = new Game(new Team('Test 1'), new Team('Test 2'));

        $scoreBoard->startGame($game);
        $scoreBoard->finishGame($game2);

        dd($scoreBoard->games);
        echo 'Hello World!';

        dd();
    }
}
