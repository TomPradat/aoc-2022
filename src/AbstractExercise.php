<?php declare(strict_types=1);

namespace Aoc;

abstract class AbstractExercise implements ExerciseInterface
{
    protected string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }
}