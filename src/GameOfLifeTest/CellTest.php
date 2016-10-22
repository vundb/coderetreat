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
}
