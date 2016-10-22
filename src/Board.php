<?php

namespace GameOfLife;

/**
 * Class Board
 *
 * @package GameOfLife
 */
class Board
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var Cell[][]
     */
    private $field;

    /**
     * @param Coordinate $coord
     *
     * @return bool
     */
    public function getStateOnField(Coordinate $coord)
    {
        return $this->field[$coord->getX()][$coord->getY()]->isAlive();
    }

    /**
     * Board constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        $this->width = $x;
        $this->height = $y;

        $this->field = [];

        $this->initField();
        $this->initCellNeighbours();
    }

    /**
     * Initialize field and assign cells.
     */
    private function initField()
    {
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {

                $this->field[$i][$j] = new Cell();
            }
        }
    }

    /**
     * Initialize cell neighbours.
     */
    private function initCellNeighbours()
    {
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {

                $neighbours = [];

                $cell = $this->field[$i][$j];

                array_push($neighbours, $this->getCell(new Coordinate($i - 1, $j - 1)));
                array_push($neighbours, $this->getCell(new Coordinate($i - 1, $j)));
                array_push($neighbours, $this->getCell(new Coordinate($i - 1, $j + 1)));
                array_push($neighbours, $this->getCell(new Coordinate($i, $j - 1)));
                array_push($neighbours, $this->getCell(new Coordinate($i, $j + 1)));
                array_push($neighbours, $this->getCell(new Coordinate($i + 1, $j - 1)));
                array_push($neighbours, $this->getCell(new Coordinate($i + 1, $j)));
                array_push($neighbours, $this->getCell(new Coordinate($i + 1, $j + 1)));

                $cell->setNeighbours($neighbours);
            }
        }
    }

    /**
     * @param Coordinate $coord
     *
     * @return Cell
     */
    public function getCell(Coordinate $coord)
    {
        if ($coord->getX() >= $this->width || $coord->getX() < 0) {
            return null;
        }

        if ($coord->getY() >= $this->height || $coord->getY() < 0) {
            return null;
        }

        return $this->field[$coord->getX()][$coord->getY()];
    }

    /**
     * @param Coordinate[] $coords
     */
    public function setAliveCellsByCoordinates(array $coords)
    {
        foreach ($coords as $coord) {
            $this->getCell($coord)->setAlive();
        }
    }

    /**
     * Change to new generation.
     */
    public function tick()
    {
        $generation = [];

        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                $generation[$i][$j] = $this->getCell(new Coordinate($i, $j))->calculateNextState();
            }
        }

        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                if ($generation[$i][$j]) {
                    $this->getCell(new Coordinate($i, $j))->setAlive();
                } else {
                    $this->getCell(new Coordinate($i, $j))->setDead();
                }
            }
        }
    }

    /**
     * Print simple board representation.s
     */
    public function printBoard()
    {
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                $cell = $this->getCell(new Coordinate($i, $j));

                if ($cell->isAlive()) {
                    echo "(X) ";
                } else {
                    echo "( ) ";
                }
            }

            echo "\n";
        }
    }
}
