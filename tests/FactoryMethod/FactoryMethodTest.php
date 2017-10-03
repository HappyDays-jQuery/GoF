<?php

namespace GoF\FactoryMethod;

use GoF\CommonTestCase;

class FactoryMethodTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testFactory()
    {
        $factory = new IDCardFactory();

        ob_start();
        $card1 = $factory->create("hoge");
        $actual = ob_get_clean();
        $this->assertEquals("create: hoge(300)\n", $actual);

        ob_start();
        $card2 = $factory->create("huga");
        $actual = ob_get_clean();
        $this->assertEquals("create: huga(301)\n", $actual);

        ob_start();
        $card3 = $factory->create("vaa");
        $actual = ob_get_clean();
        $this->assertEquals("create: vaa(302)\n", $actual);

        ob_start();
        $card1->useProduct();
        $actual = ob_get_clean();
        $this->assertEquals("use: hoge(300)\n", $actual);

        ob_start();
        $card2->useProduct();
        $actual = ob_get_clean();
        $this->assertEquals("use: huga(301)\n", $actual);

        ob_start();
        $card3->useProduct();
        $actual = ob_get_clean();
        $this->assertEquals("use: vaa(302)\n", $actual);
    }
}
