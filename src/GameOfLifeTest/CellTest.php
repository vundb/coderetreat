<?php

namespace GameOfLifeTest;

use GameOfLife\Cell;

/**
 * Class GameOfLifeTest
 *
 * @package GameOfLifeTest
 */
class CellTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAlive()
    {
        $cell = new Cell(true);

        $this->assertTrue($cell->isAlive());
    }

    public function testCountNeighbours()
    {
        $cell = new Cell();

        $this->assertEquals(0, $cell->countNeighbours());
    }

    public function testCountOneNewNeighbour()
    {
        $cell = new Cell();

        // ACT
        $cell->addNeighbour(new Cell());
        $this->assertEquals(1, $cell->countNeighbours());
    }

    public function testSetNeighbours()
    {
        $cell = new Cell();

        $neighbours = [
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell()
        ];

        $cell->setNeighbours($neighbours);

        $this->assertEquals(count($neighbours), $cell->countNeighbours());
    }

    public function testCountAlive()
    {
        $cell = new Cell();

        $neighbours = [
            new Cell(true),
            new Cell(true),
            new Cell(true),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell()
        ];

        $cell->setNeighbours($neighbours);

        $this->assertEquals(3, $cell->countLivingNeighbours());
    }

}
