<?php

namespace GoF\Bridge;

use GoF\CommonTestCase;

class BridgeTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testDisplay()
    {
        $d1 = new Display(new StringDisplayImpl("Hello, Japan."));
        $d2 = new CountDisplay(new StringDisplayImpl("Hello, world."));
        $d3 = new CountDisplay(new StringDisplayImpl("ハローワールド"));

        ob_start();
        $d1->display();
        $actual = ob_get_clean();
        $expected = <<<__STR__
+-------------+
|Hello, Japan.|
+-------------+

__STR__;

        $this->assertEquals($expected, $actual);

        ob_start();
        $d2->display();
        $actual = ob_get_clean();
        $expected = <<<__STR__
+-------------+
|Hello, world.|
+-------------+

__STR__;

        $this->assertEquals($expected, $actual);

        ob_start();
        $d3->display();
        $actual = ob_get_clean();
        $expected = <<<__STR__
+--------------+
|ハローワールド|
+--------------+

__STR__;

        $this->assertEquals($expected, $actual);

        ob_start();
        $d3->multiDisplay(5);
        $actual = ob_get_clean();
        $expected = <<<__STR__
+--------------+
|ハローワールド|
|ハローワールド|
|ハローワールド|
|ハローワールド|
|ハローワールド|
+--------------+

__STR__;

        $this->assertEquals($expected, $actual);

    }
}
