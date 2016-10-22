<?php

require_once "vendor/autoload.php";

$board = new \GameOfLife\Board(10, 10);

$coords = [
    new \GameOfLife\Coordinate(1, 3),
    new \GameOfLife\Coordinate(2, 1),
    new \GameOfLife\Coordinate(2, 3),
    new \GameOfLife\Coordinate(3, 2),
    new \GameOfLife\Coordinate(3, 3),
];

$board->setAliveCellsByCoordinates($coords);

$board->printBoard();
echo "\n";

for ($i = 0; $i < 10; $i++) {
    $board->tick();
    $board->printBoard();
    echo "\n";
    sleep(1);
}
