<?php

namespace GameOfLifeTest;

use GameOfLife\Coordinate;

/**
 * Class CoordinateTest
 *
 * @package GameOfLifeTest
 */
class CoordinateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \GameOfLife\Coordinate
     */
    public function testConstructor()
    {
        $x = 11;
        $y = 22;

        $coord = new Coordinate($x, $y);

        $this->assertEquals($x, $coord->getX());
        $this->assertEquals($y, $coord->getY());
    }

    /**
     * @covers \GameOfLife\Coordinate
     */
    public function testGetterAndSetter()
    {
        $x = 11;
        $y = 22;

        $coord = new Coordinate(0, 0);

        $coord->setX($x)->setY($y);

        $this->assertEquals($x, $coord->getX());
        $this->assertEquals($y, $coord->getY());
    }
}
