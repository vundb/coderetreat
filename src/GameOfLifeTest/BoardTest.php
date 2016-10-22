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

    public function testGetCellOutOfRange()
    {
        $board = new Board(10, 10);

        $this->assertNull($board->getCell(new Coordinate(10, 10)));
        $this->assertNull($board->getCell(new Coordinate(-1, -1)));
        $this->assertNull($board->getCell(new Coordinate(5, 10)));
        $this->assertNull($board->getCell(new Coordinate(10, 5)));
    }

    public function testInitilaizeCellNeighbours()
    {
        $board = new Board(10, 10);

        $this->assertEquals(8, $board->getCell(new Coordinate(5, 5))->countNeighbours());
        $this->assertEquals(3, $board->getCell(new Coordinate(0, 0))->countNeighbours());
        $this->assertEquals(5, $board->getCell(new Coordinate(5, 9))->countNeighbours());
    }

    public function testIfCellNeighboursAreRightPointer()
    {
        $board = new Board(10, 10);

        $cell1 = $board->getCell(new Coordinate(0,0));
        $cell2 = $board->getCell(new Coordinate(1,1));

        $this->assertTrue($cell1->isCellYourNeighbour($cell2));
        $this->assertTrue($cell2->isCellYourNeighbour($cell1));
    }
}
