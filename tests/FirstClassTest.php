<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PSG\FirstClass;

final class FirstClassTest extends TestCase
{
    public function test_something(): void
    {
        $actual = FirstClass::firstMethod();

        self::assertTrue($actual);
    }
}
