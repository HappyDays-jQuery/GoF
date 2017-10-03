<?php

namespace GoF\ChainOfResponsibility;

use GoF\CommonTestCase;

class ChainOfResponsibilityTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testSupport()
    {
        $alice = new NoSupport("Alice");
        $alice
            ->setNext(new LimitSupport("Bob", 100))
            ->setNext(new SpecialSupport("Charlie", 429))
            ->setNext(new LimitSupport("Diana", 200))
            ->setNext(new OddSupport("Elmo"))
            ->setNext(new LimitSupport("Fred", 300));

        $expected = <<< __EOL__
[Trouble 0] is resolved by [Bob].
[Trouble 33] is resolved by [Bob].
[Trouble 66] is resolved by [Bob].
[Trouble 99] is resolved by [Bob].
[Trouble 132] is resolved by [Diana].
[Trouble 165] is resolved by [Diana].
[Trouble 198] is resolved by [Diana].
[Trouble 231] is resolved by [Elmo].
[Trouble 264] is resolved by [Fred].
[Trouble 297] is resolved by [Elmo].
[Trouble 330] cannot be resolved.
[Trouble 363] is resolved by [Elmo].
[Trouble 396] cannot be resolved.
[Trouble 429] is resolved by [Charlie].
[Trouble 462] cannot be resolved.
[Trouble 495] is resolved by [Elmo].

__EOL__;

        ob_start();
        for ($i = 0; $i < 500; $i += 33) {
            $alice->support(new Trouble($i));
        }
        $actual = ob_get_clean();
        $this->assertEquals($expected, $actual);
    }
}
