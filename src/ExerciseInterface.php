<?php declare(strict_types=1);

namespace Aoc;

interface ExerciseInterface {
    public function getFirstPartAnswer(): string|int;

    public function getSecondPartAnswer(): string|int;
}