<?php

namespace GoF\TemplateMethod;


use GoF\CommonTestCase;

class TemplateMethodTest extends CommonTestCase
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
        $d1 = new CharDisplay('H');
        $d2 = new StringDisplay("Hello, world.");
        $d3 = new StringDisplay("ハローワールド");

        ob_start();
        $d1->display();
        $actual = ob_get_clean();
        $this->assertEquals("<<HHHHH>>\n", $actual);

        ob_start();
        $d2->display();
        $actual = ob_get_clean();
        $expected = <<<__STR__
+-------------+
|Hello, world.|
|Hello, world.|
|Hello, world.|
|Hello, world.|
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
|ハローワールド|
|ハローワールド|
|ハローワールド|
|ハローワールド|
+--------------+

__STR__;

        $this->assertEquals($expected, $actual);
    }
}
