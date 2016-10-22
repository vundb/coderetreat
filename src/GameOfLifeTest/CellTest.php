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
    public function testCountLivingNeighbours()
    {
        $cell = new Cell();

        $cells = $this->createNeighbours(8);
        $cells[0]->setAlive(true);
        $cells[1]->setAlive(true);

        $cell->setNeighbours($cells);

        $this->assertEquals(2, $cell->countLivingNeighbours());
    }

    public function testsetNeighbours()
    {
        $cell = new Cell();

        $cells = $this->createNeighbours(8);
        $cells[0]->setAlive(true);
        $cells[1]->setAlive(true);

        $return = $cell->setNeighbours($cells);
        $this->assertTrue($return);
    }

    public function testSetAlive()
    {
        $cell = new Cell(true);

        $cells = $this->createNeighbours(8);
        $cells[0]->setAlive(true);
        $cells[1]->setAlive(true);
        $cells[3]->setAlive(true);

        $cell->setNeighbours($cells);

        $this->assertEquals(3, $cell->countLivingNeighbours());
    }

    public function testSetDead()
    {
        $cell = new Cell(true);

        $cells = $this->createNeighbours(3);
        $cells[0]->setAlive(true);
        $cells[0]->setDead(true);

        $cell->setNeighbours($cells);

        $this->assertEquals(0, $cell->countLivingNeighbours());
    }

    public function testLivingCellWillBeDeadWithDeadNeighbours()
    {
        $cell = new Cell(true);
        $cell->setNeighbours(
            $this->createNeighbours(8)
        );

        $cell->calculateNextState();

        $this->assertFalse($cell->getNextState());
    }

    public function testCellWillBeRescuedIfThreeNeighboursAreAlive()
    {
        $cell = new Cell(true);
        $neighbours = $this->createNeighbours(8);
        $neighbours[0]->setAlive();
        $neighbours[1]->setAlive();
        $neighbours[2]->setAlive();
        $cell->setNeighbours($neighbours);

        $cell->calculateNextState();

        $this->assertTrue($cell->getNextState());
    }

    #######

    /**
     * @param $count
     *
     * @return Cell[]
     */
    private function createNeighbours($count)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = new Cell();
        }
        return $result;
    }
}
