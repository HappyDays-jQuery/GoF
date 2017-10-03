<?php

namespace GoF\Facade;

use GoF\ChainOfResponsibility\LimitSupport;
use GoF\ChainOfResponsibility\NoSupport;
use GoF\ChainOfResponsibility\OddSupport;
use GoF\ChainOfResponsibility\SpecialSupport;
use GoF\ChainOfResponsibility\Support;
use GoF\ChainOfResponsibility\Trouble;

class Facade
{
    /**
     * @var Support
     */
    private $alice;

    public function __construct()
    {
        $this->alice = new NoSupport("Alice");
        $this->alice
            ->setNext(new LimitSupport("Bob", 100))
            ->setNext(new SpecialSupport("Charlie", 429))
            ->setNext(new LimitSupport("Diana", 200))
            ->setNext(new OddSupport("Elmo"))
            ->setNext(new LimitSupport("Fred", 300));
    }

    public function run()
    {
        for ($i = 0; $i < 500; $i += 33) {
            $this->alice->support(new Trouble($i));
        }
    }
}
