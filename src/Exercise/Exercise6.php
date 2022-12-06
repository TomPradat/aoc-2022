<?php declare(strict_types=1);

namespace Aoc\Exercise;

use Aoc\AbstractExercise;

class Exercise6 extends AbstractExercise
{
    public function getFirstPartAnswer(): string|int
    {
       return $this->getNumberOfProcessedChars(4);
    }

    public function getSecondPartAnswer(): string|int
    {
        return $this->getNumberOfProcessedChars(14);
    }

    private function getNumberOfProcessedChars(int $markerLength)
    {
        $signal = $this->data;

        $i = 0;
        $marker = null;

        do {
            $markerCandidate = substr($signal, $i, $markerLength);

            if ($this->isMarkerValid($markerCandidate)) {
                $marker = $markerCandidate;
            }

            $i++;
        } while (null === $marker);

        return strpos($signal, $marker) + $markerLength;
    }

    private function isMarkerValid(string $candidate): bool
    {
        $occurrences = [];

        foreach (str_split($candidate) as $char) {
            $occurrences[$char] = array_key_exists($char, $occurrences) ? $occurrences[$char] + 1 : 1;
        }

        return count(array_filter($occurrences, function ($num) {
            return $num !== 1;
        })) === 0;
    }
}