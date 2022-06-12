<?php

declare(strict_types=1);

namespace Application\Tests;

use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase
{
    public function testIsAlwaysTrue(): void
    {
        $this->assertTrue(true);
    }
}
