<?php

namespace GoF\Mediator;

class User implements Colleague
{
    /**
     * @var Mediator
     */
    private $mediator;
    /**
     * @var string
     */
    private $name;

    /**
     * User constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Mediator $mediator
     */
    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    /**
     * @param string $to
     * @param string $message
     */
    public function sendMessage($to, $message)
    {
        $this->mediator->sendMessage($this->name, $to, $message);
    }

    /**
     * @param string $from
     * @param string $message
     */
    public function receiveMessage($from, $message)
    {
        printf("%sさんから%sさんへ： %s\n", $from, $this->getName(), $message);
    }
}
