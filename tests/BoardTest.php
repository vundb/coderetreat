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
    /**
     * @covers \GameOfLife\Board
     */
    public function testBoardConstructor()
    {
        $board = new Board(10, 10);
        $coord = new Coordinate(5, 5);

        $this->assertFalse($board->getStateOnField($coord));
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testGetCell()
    {
        $board = new Board(10, 10);

        $this->assertInstanceOf(Cell::class, $board->getCell(new Coordinate(5, 5)));
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testGetCellOutOfRange()
    {
        $board = new Board(10, 10);

        $this->assertNull($board->getCell(new Coordinate(10, 10)));
        $this->assertNull($board->getCell(new Coordinate(-1, -1)));
        $this->assertNull($board->getCell(new Coordinate(5, 10)));
        $this->assertNull($board->getCell(new Coordinate(10, 5)));
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testInitilaizeCellNeighbours()
    {
        $board = new Board(10, 10);

        $this->assertEquals(8, $board->getCell(new Coordinate(5, 5))->countNeighbours());
        $this->assertEquals(3, $board->getCell(new Coordinate(0, 0))->countNeighbours());
        $this->assertEquals(5, $board->getCell(new Coordinate(5, 9))->countNeighbours());
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testIfCellNeighboursAreRightPointer()
    {
        $board = new Board(10, 10);

        $cell1 = $board->getCell(new Coordinate(0, 0));
        $cell2 = $board->getCell(new Coordinate(1, 1));

        $this->assertTrue($cell1->isCellYourNeighbour($cell2));
        $this->assertTrue($cell2->isCellYourNeighbour($cell1));
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testSetAliveCellsByCoordinates()
    {
        $board = new Board(10, 10);

        $coords = [
            new Coordinate(5, 5),
            new Coordinate(6, 6)
        ];

        $board->setAliveCellsByCoordinates($coords);

        $this->assertTrue($board->getCell($coords[0])->isAlive());
        $this->assertTrue($board->getCell($coords[1])->isAlive());
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testTickWhenDeadCellWillBeBorn()
    {
        $board = new Board(10, 10);

        $coords = [
            new Coordinate(0, 1),
            new Coordinate(1, 1),
            new Coordinate(1, 0)
        ];
        $board->setAliveCellsByCoordinates($coords);
        $board->tick();

        $this->assertTrue($board->getCell($coords[0])->isAlive());
        $this->assertTrue($board->getCell($coords[1])->isAlive());
        $this->assertTrue($board->getCell($coords[2])->isAlive());
        $this->assertTrue($board->getCell(new Coordinate(0, 0))->isAlive());
    }

    /**
     * @covers \GameOfLife\Board
     */
    public function testTickWhenAllCellWillSurvive()
    {
        $board = new Board(10, 10);

        $coords = [
            new Coordinate(0, 0),
            new Coordinate(0, 1),
            new Coordinate(1, 1),
            new Coordinate(1, 0)
        ];
        $board->setAliveCellsByCoordinates($coords);
        $board->tick();

        $this->assertTrue($board->getCell($coords[0])->isAlive());
        $this->assertTrue($board->getCell($coords[1])->isAlive());
        $this->assertTrue($board->getCell($coords[2])->isAlive());
        $this->assertTrue($board->getCell($coords[2])->isAlive());
    }
}
