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

    private $nextState;

    private $neighbours = [];

    public function __construct($state = false)
    {
        $this->state = $state;
        $this->nextState = false;
    }

    /**
     * @param array $neighbours
     *
     * @return bool
     */
    public function setNeighbours(array $neighbours)
    {
        $this->neighbours = $neighbours;
        return true;
    }

    public function countLivingNeighbours()
    {
        $cellsWhichAreStillAliveAndThisNameIsNotToLong = [];
        foreach ($this->neighbours as $neighbour) {
            if ($neighbour->state) {
                array_push($cellsWhichAreStillAliveAndThisNameIsNotToLong, $neighbour);
            }
        }
        return count($cellsWhichAreStillAliveAndThisNameIsNotToLong);
    }

    public function setAlive()
    {
        $this->state = true;
        return true;
    }

    public function setDead()
    {
        $this->state = false;
    }

    public function calculateNextState()
    {
        var_dump($this->neighbours); die();
        if ($this->state && 3 === $this->countLivingNeighbours()) {
            $this->nextState = true;
        }

        $this->nextState = false;
    }

    public function getNextState()
    {
        return $this->nextState;
    }
}
