<?php

namespace GameOfLife;

/**
 * Class Cell
 *
 * @package GameOfLife
 */
class Cell
{
    private $state;

    /**
     * Cell constructor.
     *
     * @param boolean $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->state;
    }
}
