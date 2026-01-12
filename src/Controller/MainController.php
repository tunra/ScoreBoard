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

        $game = $scoreBoard->startGame('Team A', 'Team B');
        $game2 = $scoreBoard->startGame('Team C', 'Team D');

        // Finish Game
        echo 'Finish Game';
        dump($scoreBoard->games);

        $scoreBoard->finishGame($game2);

        dump($scoreBoard->games);
        echo '<hr>';

        echo 'Update Score';
        $scoreBoard->updateScore();

        dd();
    }
}
