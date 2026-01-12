<?php

namespace App\Controller;

use App\Game;
use App\ScoreBoard;
use App\Team;
use JetBrains\PhpStorm\NoReturn;
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

        $mexico = $scoreBoard->startGame('Mexico', 'Canada');
        $game2 = $scoreBoard->startGame('Team C', 'Team D');
        $spain = $scoreBoard->startGame('Spain', 'Brazil');
        $germany = $scoreBoard->startGame('Germany', 'France');
        $uruguay = $scoreBoard->startGame('Uruguay', 'Italy');
        $argentina = $scoreBoard->startGame('Argentina', 'Australia');

        // Finish Game
        echo '<h3>Finish Game</h3>';
        dump($scoreBoard->games);

        $scoreBoard->finishGame($game2);

        dump($scoreBoard->games);
        echo '<hr>';

        echo '<h3>Update Score:</h3>';
        $scoreBoard->updateScore($mexico, 0, 5);
        $scoreBoard->updateScore($spain, 10, 2);
        $scoreBoard->updateScore($germany, 2, 2);
        $scoreBoard->updateScore($uruguay, 6, 6);
        $scoreBoard->updateScore($argentina, 3, 1);

        dump($scoreBoard->games);

        echo '<hr>';

        echo '<h3>Summary:</h3>';
        dd($scoreBoard->summary());

        echo '<hr>';

        dd($scoreBoard->games);

        dd();
    }
}
