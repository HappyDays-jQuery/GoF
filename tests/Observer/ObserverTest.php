<?php

namespace GoF\Observer;

use GoF\CommonTestCase;

class ObserverTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testObserver()
    {
        $generator = new RandomNumberGenerator();
        $observer1 = new DigitObserver();
        $observer2 = new GraphObserver();

        ob_start();
        $generator->addObserver($observer1);
        $generator->addObserver($observer2);
        $generator->execute();
        $actual = ob_get_clean();
        $this->assertContains('GraphObserver',$actual);
    }
}
