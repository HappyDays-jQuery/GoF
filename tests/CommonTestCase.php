<?php

namespace GoF;

use PHPUnit\Framework\TestCase;

abstract class CommonTestCase extends TestCase
{
    protected $expected;
    protected $actual;

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    protected function verify($message = null)
    {
        $this->assertEquals($this->expected, $this->actual, $message);
    }
}
