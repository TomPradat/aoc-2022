<?php declare(strict_types=1);

namespace Aoc\Exercise;

use Aoc\AbstractExercise;

class Exercise1 extends AbstractExercise
{
    public function getFirstPartAnswer(): string|int
    {
        $elves_calories_blocs = $this->parseData($this->data);

        $summed_elves_calories = array_map(function ($bloc) {
            return array_reduce($bloc, function ($acc, $line) {
                return $acc + intval($line);
            }, 0);
        }, $elves_calories_blocs);
    
        return max($summed_elves_calories);
    }

    public function getSecondPartAnswer(): string|int
    {
        $elves_calories_blocs = $this->parseData($this->data);

        $summed_elves_calories = array_map(function ($bloc) {
            return array_reduce($bloc, function ($acc, $line) {
                return $acc + intval($line);
            }, 0);
        }, $elves_calories_blocs);
    
        sort($summed_elves_calories, SORT_NUMERIC);
        $ordered_summed_elves_calories = array_reverse($summed_elves_calories);
    
        return $ordered_summed_elves_calories[0] + $ordered_summed_elves_calories[1] + $ordered_summed_elves_calories[2];
    }

    private function parseData($raw) {
        return array_map(function($bloc) {
            return explode("\n", $bloc);
        }, explode("\n\n", $raw));
    }
}