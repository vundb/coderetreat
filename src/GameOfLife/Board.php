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
        $this->x = $x;
        $this->y = $y;

        $this->field = [];

        $this->initField();
    }

    /**
     * Initialize field and assign cells.
     */
    private function initField()
    {
        for ($i = 0; $i < $this->x; $i++) {
            for ($j = 0; $j < $this->y; $j++) {

                $this->field[$i][$j] = new Cell();
            }
        }
    }
}
