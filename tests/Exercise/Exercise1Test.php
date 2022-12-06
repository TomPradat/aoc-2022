<?php declare(strict_types=1);

namespace Tests\Exercise;

use Aoc\Exercise\Exercise1;
use PHPUnit\Framework\TestCase;

final class Exercise1Test extends TestCase
{
    protected function setUp(): void
    {
        $this->exercise = new Exercise1('1000
2000
3000

4000

5000
6000

7000
8000
9000

10000');
    }

    public function testFirstAnswer(): void
    {
        $this->assertEquals(24000, $this->exercise->getFirstPartAnswer());
    }

    public function testSecondAnswer(): void
    {
        $this->assertEquals(45000, $this->exercise->getSecondPartAnswer());
    }
}