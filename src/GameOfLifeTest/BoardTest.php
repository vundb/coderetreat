<?php

namespace GameOfLifeTest;

use GameOfLife\Board;
use GameOfLife\Coordinate;

/**
 * Class BoardTest
 *
 * @package GameOfLifeTest
 */
class BoardTest extends \PHPUnit_Framework_TestCase
{
    public function testBoardConstructor()
    {
        $board = new Board(10, 10);
        $coord = new Coordinate(5, 5);

        $this->assertFalse($board->getStateOnField($coord));
    }
}
