<?php

namespace GoF\Mediator;

interface Colleague
{
    /**
     * @param Mediator $mediator
     * @return void
     */
    public function setMediator(Mediator $mediator);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $from
     * @param string $message
     */
    public function receiveMessage($from, $message);
}
