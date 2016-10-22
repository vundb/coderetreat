<?php

namespace GameOfLife;

/**
 * Class Cell
 *
 * @package GameOfLife
 */
class Cell
{
    /**
     * @var bool
     */
    private $state;

    /**
     * @var array
     */
    private $neighbours;

    /**
     * Cell constructor.
     *
     * @param boolean $state
     */
    public function __construct($state = false)
    {
        $this->state = $state;
        $this->neighbours = [];
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->state;
    }

    /**
     * @return int
     */
    public function countNeighbours()
    {
        return count($this->neighbours);
    }
}
