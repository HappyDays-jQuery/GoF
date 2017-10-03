<?php

namespace GoF\Memento;

use GoF\Collection\ArrayList;

class Gamer
{
    /**
     * @var int
     */
    private $money;

    /**
     * @var ArrayList
     */
    private $fruits;
    /**
     * @var array
     */
    private static $fruitsName = [
        "リンゴ", "ぶどう", "バナナ", "みかん"
    ];

    /**
     * Gamer constructor.
     * @param int $money
     */
    public function __construct($money)
    {
        $this->money = $money;
        $this->fruits = new ArrayList();
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function bet()
    {
        $dice = mt_rand(1, 6);
        if ($dice == 1) {
            $this->money += 100;
            echo "所持金が増えました。\n";
            return;
        } elseif ($dice == 2) {
            $this->money /= 2;
            echo "所持金が半分になりました。\n";
            return;
        } elseif ($dice == 6) {
            $f = $this->getFruit();
            echo "フルーツ({$f})をもらいました。\n";
            $this->fruits->add($f);
            return;
        }
        echo "何もおきませんでした。\n";
    }

    /**
     * @return Memento
     */
    public function createMemento()
    {
        $m = new Memento($this->money);

        $it = $this->fruits->iterator();
        while ($it->valid()) {
            $f = $it->current();
            if (preg_match("/^おいしい.*/", $f)) {
                $m->addFruit($f);
            }
            $it->next();
        }
        return $m;
    }

    /**
     * @param Memento $memento
     */
    public function restoreMemento(Memento $memento)
    {
        $this->money = $memento->getMoney();
        $this->fruits = $memento->getFruits();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[money = {$this->money}, fruits = {$this->fruits}]";
    }

    /**
     * @return string
     */
    private function getFruit()
    {
        $prefix = "";
        if (mt_rand(0, 1) == 0) {
            $prefix = "おいしい";
        }

        return $prefix . self::$fruitsName[mt_rand(0, 3)];
    }
}
