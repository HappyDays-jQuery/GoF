<?php

namespace GoF\Prototype;


use GoF\CommonTestCase;

class PrototypeTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testPrototype()
    {
        $manager = new Manager();
        $upen = new UnderlinePen('~');
        $mbox = new MessageBox('*');
        $sbox = new MessageBox('/');
        $manager->register("strong message", $upen);
        $manager->register("warning box", $mbox);
        $manager->register("slash box", $sbox);

        $p1 = $manager->createInstance("strong message");
        $p2 = $manager->createInstance("warning box");
        $p3 = $manager->createInstance("slash box");

        ob_start();
        $p1->useProduct("Hello, world.");
        $actual = ob_get_clean();
        $expected = <<<__EOL__
Hello, world.
~~~~~~~~~~~~~

__EOL__;
        $this->assertEquals($expected, $actual);

        ob_start();
        $p2->useProduct("Hello, world.");
        $actual = ob_get_clean();
        $expected = <<<__EOL__
*****************
* Hello, world. *
*****************

__EOL__;
        $this->assertEquals($expected, $actual);

        ob_start();
        $p3->useProduct("Hello, world.");
        $actual = ob_get_clean();
        $expected = <<<__EOL__
/////////////////
/ Hello, world. /
/////////////////

__EOL__;
        $this->assertEquals($expected, $actual);


    }
}
