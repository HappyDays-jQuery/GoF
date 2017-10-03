<?php

namespace GoF\Strategy;


use GoF\CommonTestCase;

class StrategyTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testStrategy()
    {
        $player1 = new Player("Taro", new WinningStrategy());
        $player2 = new Player("Hana", new ProbStrategy());

        ob_start();
        for ($i = 0; $i < 10; $i++) {
            $nextHand1 = $player1->nextHand();
            $nextHand2 = $player2->nextHand();
            if ($nextHand1->isStrongerThan($nextHand2)) {
                $player1->win();
                $player2->lose();
                echo "Winner: {$player1}\n";
            } else if ($nextHand2->isStrongerThan($nextHand1)) {
                $player1->lose();
                $player2->win();
                echo "Winner: {$player2}\n";
            } else {
                $player1->even();
                $player2->even();
                echo "Even...\n";
            }
        }
        $actual = ob_get_clean();
        $this->assertContains('Winner',$actual);
    }
}
