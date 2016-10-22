<?php

namespace GameOfLifeTest;

use GameOfLife\Board;
use GameOfLife\Cell;
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

    public function testGetCell()
    {
        $board = new Board(10, 10);

        $this->assertInstanceOf(Cell::class, $board->getCell(new Coordinate(5, 5)));
    }

//    public function testInitilaizeCellNeighbours()
//    {
//        $board = new Board(10, 10);
//
//        $this->assertEquals(8, $board->getCell(new Coordinate(5, 5))->countNeighbours());
//        $this->assertEquals(3, $board->getCell(new Coordinate(0, 0))->countNeighbours());
//    }
}
