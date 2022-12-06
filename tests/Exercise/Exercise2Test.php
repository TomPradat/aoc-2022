<?php declare(strict_types=1);

namespace Tests\Exercise;

use Aoc\Exercise\Exercise2;
use PHPUnit\Framework\TestCase;

final class Exercise2Test extends TestCase
{
    protected function setUp(): void
    {
        $this->exercise = new Exercise2('A Y
B X
C Z');
    }

    public function testFirstAnswer(): void
    {
        $this->assertEquals(15, $this->exercise->getFirstPartAnswer());
    }

    public function testSecondAnswer(): void
    {
        $this->assertEquals(12, $this->exercise->getSecondPartAnswer());
    }
}