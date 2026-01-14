<?php

namespace App\Tests;


use App\ScoreBoard\Game;
use App\ScoreBoard\ScoreBoard;

class ScoreBoardTest extends \PHPUnit\Framework\TestCase
{
    private function getFullScoreBoard(): ScoreBoard
    {


        return $scoreBoard;
    }

    public function testStartGameScoreIsZero()
    {
        $scoreBoard = new ScoreBoard();

        $mexico = $scoreBoard->startGame('Mexico', 'Canada');

        $this->assertEquals(0, $mexico->home->score);
    }

    public function testStartGameArrayKeyExists()
    {
        $scoreBoard = new ScoreBoard();

        $mexico = $scoreBoard->startGame('Mexico', 'Canada');

        $this->assertArrayHasKey($mexico->id, $scoreBoard->games);
    }

    public function testFinishGameEmpty()
    {
        $scoreBoard = new ScoreBoard();

        $mexico = $scoreBoard->startGame('Mexico', 'Canada');
        $scoreBoard->finishGame($mexico);

        $this->assertEmpty($scoreBoard->games);
    }

    public function testFinishGame()
    {
        $scoreBoard = new ScoreBoard();

        $game1 = $scoreBoard->startGame('Mexico', 'Canada');
        $game2 = $scoreBoard->startGame('Team C', 'Team D');

        $scoreBoard->finishGame($game1);

        $this->assertCount( 1, $scoreBoard->games);
        $this->assertArrayNotHasKey($game1->id, $scoreBoard->games);
    }

    public function testFinishGameDoesNotExist()
    {
        $scoreBoard = new ScoreBoard();

        $this->expectException(\InvalidArgumentException::class);
        $scoreBoard->finishGame(Game::createGame('Mexico', 'Canada'));
    }

    public function testUpdateScoreNegativeScore()
    {
        $scoreBoard = new ScoreBoard();
        $game = $scoreBoard->startGame('Mexico', 'Canada');

        $this->expectException(\InvalidArgumentException::class);
        $scoreBoard->updateScore($game, -1, 0);

        $this->assertEquals(0, $game->home->score);
    }

    public function testUpdateScoreGameNotFound()
    {
        $scoreBoard = new ScoreBoard();

        $this->expectException(\InvalidArgumentException::class);
        $scoreBoard->updateScore(Game::createGame('Mexico', 'Canada'), 1, 0);
    }

    public function testUpdateScore()
    {
        $scoreBoard = new ScoreBoard();

        $game = $scoreBoard->startGame('Mexico', 'Canada');
        $scoreBoard->updateScore($game, 1, 0);
        $this->assertEquals(1, $game->home->score);
        $this->assertEquals(0, $game->away->score);

        $scoreBoard->updateScore($game, 5, 5);
        $this->assertEquals(5, $game->home->score);
        $this->assertEquals(5, $game->away->score);
    }

    public function testSummary()
    {
        $scoreBoard = new ScoreBoard();

        $mexico = $scoreBoard->startGame('Mexico', 'Canada');
        $spain = $scoreBoard->startGame('Spain', 'Brazil');
        $germany = $scoreBoard->startGame('Germany', 'France');
        $uruguay = $scoreBoard->startGame('Uruguay', 'Italy');
        $argentina = $scoreBoard->startGame('Argentina', 'Australia');

        $scoreBoard->updateScore($mexico, 0, 5);
        $scoreBoard->updateScore($spain, 10, 2);
        $scoreBoard->updateScore($germany, 2, 2);
        $scoreBoard->updateScore($uruguay, 6, 6);
        $scoreBoard->updateScore($argentina, 3, 1);

        $summary = $scoreBoard->summary();

        $games = array_keys($summary);
//        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys([
//
//        ]);
    }
}
