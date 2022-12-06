<?php declare(strict_types=1);

namespace Aoc\Exercise;

use Aoc\AbstractExercise;

const ROCK = 'ROCK';
const PAPER = 'PAPER';
const SCISSORS = 'SCISSORS';

const WIN_LETTER_MATCHES = [
    'A' => 'Y',
    'B' => 'Z',
    'C' => 'X'
];

const LOOSE_LETTER_MATCHES = [
    'A' => 'Z',
    'B' => 'X',
    'C' => 'Y'
];

const WIN_SCORE = 6;
const DRAW_SCORE = 3;
const LOST_SCORE = 0;

const LETTER_MAPPING = [
    'A' => ROCK,
    'B' => PAPER,
    'C' => SCISSORS,
    'X' => ROCK,
    'Y' => PAPER,
    'Z' => SCISSORS
];

class Move {
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getScore() {
        switch ($this->name) {
            case ROCK:
                return 1;
            case PAPER:
                return 2;
            case SCISSORS:
                return 3;
        }
    }
}

class Round {
    private Move $move1;
    private Move $move2;

    public function __construct(Move $move1, Move $move2)
    {
        $this->move1 = $move1;
        $this->move2 = $move2;
    }

    public function getScore(): int {
        $score = $this->move2->getScore();

        switch ($this->getWinner()) {
            case 0:
                $score += DRAW_SCORE;
                break;
            case 2:
                $score += WIN_SCORE;
                break;
            case 1:
                $score += LOST_SCORE;
                break;
        }

        return $score;
    }

    private function getWinner() {
        if ($this->move1->name === $this->move2->name) {
            return 0;
        }

        switch ($this->move1->name) {
            case ROCK:
                return $this->move2->name === SCISSORS ? 1 : 2;
            case PAPER:
                return $this->move2->name === ROCK ? 1 : 2;
            case SCISSORS:
                return $this->move2->name === PAPER ? 1 : 2;
        }
    }
}

class Exercise2 extends AbstractExercise
{
    public function getFirstPartAnswer(): string|int
    {
        $rounds = $this->parseData($this->data);

        return array_reduce($rounds, function (int $acc, string $round) {
            return $acc + $this->getScore($round);
        }, 0);
    }

    public function getSecondPartAnswer(): string|int
    {
        $rounds = array_map(function (string $round) {
            [$move1Letter, $shouldWinLetter] = explode(' ', $round);
    
            $move2Letter = null;
    
            switch ($shouldWinLetter) {
                case 'Y':
                    $move2Letter = $move1Letter;
                    break;
                case 'X':
                    $move2Letter = LOOSE_LETTER_MATCHES[$move1Letter];
                    break;
                case 'Z':
                    $move2Letter = WIN_LETTER_MATCHES[$move1Letter];
                    break;
            }
    
            return join(" ", [$move1Letter, $move2Letter]);
        }, $this->parseData($this->data));
    
        return array_reduce($rounds, function (int $acc, string $round) {
            return $acc + $this->getScore($round);
        }, 0);
    }

    private function parseData($raw) {
        return explode("\n", $raw);
    }
    
    private function getScore(string $line) {
        [$player1Move, $player2Move] = array_map(function (string $move): Move {
            return new Move(LETTER_MAPPING[$move]);
        }, explode(' ', $line));
    
        $round = new Round($player1Move, $player2Move); 
    
        return $round->getScore();
    }
}