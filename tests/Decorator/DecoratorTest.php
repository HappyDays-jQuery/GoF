<?php

namespace GoF\Decorator;


use GoF\CommonTestCase;

class DecoratorTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testDecorator()
    {
        $b1 = new StringDisplay("Hello, world.");
        $b2 = new SideBorder($b1, '#');
        $b3 = new FullBorder($b2);

        $expected = <<<__STR__
+---------------+
|#Hello, world.#|
+---------------+

__STR__;
        ob_start();
        $b3->show();
        $actual = ob_get_clean();
        $this->assertEquals($expected, $actual);

        $b4 = new SideBorder(
                new FullBorder(
                    new FullBorder(
                        new SideBorder(
                            new FullBorder(
                                new StringDisplay("Hello, world.")
                            ),
                            '*'
                        )
                    )
                ),
                '/'
            );

        $expected = <<<__STR__
/+-------------------+/
/|+-----------------+|/
/||*+-------------+*||/
/||*|Hello, world.|*||/
/||*+-------------+*||/
/|+-----------------+|/
/+-------------------+/

__STR__;

        ob_start();
        $b4->show();
        $actual = ob_get_clean();
        $this->assertEquals($expected, $actual);
    }
}
