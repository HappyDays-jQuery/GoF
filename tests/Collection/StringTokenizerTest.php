<?php

namespace GoF\Collection;

use GoF\CommonTestCase;

class StringTokenizerTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testToString()
    {
        $expected = "this is a test";
        $tokenizer = new StringTokenizer($expected);
        $this->assertEquals("[this][is][a][test]", (string)$tokenizer);
    }
}
