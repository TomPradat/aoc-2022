<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Aoc\Exercise\Exercise2;

$exercise1 = new Exercise2(file_get_contents('./data/exercise2.txt'));

echo 'First answer : ' . $exercise1->getFirstPartAnswer() . "\n";
echo 'Second answer : ' . $exercise1->getSecondPartAnswer();