<?php

namespace GoF\Strategy;

abstract class Strategy
{
    /**
     * @var Hand[]
     */
    protected $hands;

    /**
     * ProbStrategy constructor.
     */
    public function __construct()
    {
        $this->hands = [
            new Hand(0, 'グー'),
            new Hand(1, 'チョキ'),
            new Hand(2, 'パー'),
        ];
    }

    /**
     * @return Hand
     */
    abstract public function nextHand();

    abstract public function study($win);
}
