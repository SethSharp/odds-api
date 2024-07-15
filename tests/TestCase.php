<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /** @test */
    public function it_does_something()
    {
        $this->markTestSkipped();
    }
}