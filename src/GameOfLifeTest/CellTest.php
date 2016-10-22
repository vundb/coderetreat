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

        $neighbours = $this->createNeighbours(8);

        $cell->setNeighbours($neighbours);

        $this->assertEquals(count($neighbours), $cell->countNeighbours());
    }

    public function testSetNeighboursWithNullValues()
    {
        $cell = new Cell();

        $neighbours = $this->createNeighbours(8);
        array_push($neighbours, null);
        array_push($neighbours, null);

        $cell->setNeighbours($neighbours);

        $this->assertEquals(count($neighbours) - 2, $cell->countNeighbours());
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

    public function testGetNextState()
    {
        $cell = new Cell(true);

        $cell->setNeighbours($this->createNeighbours(8));

        $this->assertFalse($cell->calculateNextState());
    }

    public function testGetNextState2()
    {
        $cell = new Cell(true);

        $cell->setNeighbours($this->createNeighbours(6, 2));

        $this->assertTrue($cell->calculateNextState());
    }

    public function testGetNextState3()
    {
        $cell = new Cell(false);

        $cell->setNeighbours($this->createNeighbours(5, 3));

        $this->assertTrue($cell->calculateNextState());
    }

    ########

    /**
     * @param int $deadAmount
     * @param int $aliveAmount
     *
     * @return array
     */
    private function createNeighbours($deadAmount, $aliveAmount = 0)
    {
        $result = [];
        for ($i = 0; $i < $deadAmount; $i++) {
            array_push($result, new Cell());
        }
        for ($i = 0; $i < $aliveAmount; $i++) {
            array_push($result, new Cell(true));
        }
        return $result;
    }
}
