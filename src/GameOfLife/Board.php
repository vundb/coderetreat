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

    private function initCellNeighbours()
    {
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {

                $cell = $this->field[$i][$j];
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
}
