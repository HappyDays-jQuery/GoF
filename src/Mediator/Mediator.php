<?php

namespace GoF\Mediator;

abstract class Mediator
{
    /**
     * @param Colleague $colleague
     * @return void
     */
    abstract public function createColleagues(Colleague $colleague);

    /**
     * @param string $from
     * @param string $to
     * @param string $message
     * @return void
     */
    abstract public function sendMessage($from, $to, $message);
}
