<?php declare(strict_types=1);

namespace Tests\Exercise;

use Aoc\Exercise\Exercise6;
use PHPUnit\Framework\TestCase;

final class Exercise6Test extends TestCase
{
    protected function setUp(): void
    {
        $this->exercise = new Exercise6('mjqjpqmgbljsphdztnvjfqwrcgsmlb');
    }

    public function testFirstAnswer(): void
    {
        $this->assertEquals(7, $this->exercise->getFirstPartAnswer());
    }

    public function testSecondAnswer(): void
    {
        $this->assertEquals(19, $this->exercise->getSecondPartAnswer());
    }
}