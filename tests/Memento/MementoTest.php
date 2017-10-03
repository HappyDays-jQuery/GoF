<?php

namespace GoF\Memento;

use GoF\CommonTestCase;

class MementoTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testMemento()
    {
        $gamer = new Gamer(100);
        $memento = $gamer->createMemento();

        ob_start();
        for ($i = 0; $i < 10; $i++) {
            echo "==== {$i} \n";
            echo "現状: {$gamer} \n";

            $gamer->bet();

            echo "所持金は" . $gamer->getMoney() . "円になりました。\n";

            if ($gamer->getMoney() > $memento->getMoney()) {
                echo "    （だいぶ増えたので、現在の状態を保存しておこう）\n";
                $memento = $gamer->createMemento();
            } elseif ($gamer->getMoney() < $memento->getMoney() / 2) {
                echo "    （だいぶ減ったので、以前の状態に復帰しよう）\n";
                $gamer->restoreMemento($memento);
            }
        }
        $actual = ob_get_clean();
        $this->assertContains('==== 9',$actual);
    }
}
