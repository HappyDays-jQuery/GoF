<?php

namespace GoF\ChainOfResponsibility;

abstract class Support
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Support
     */
    private $next;

    /**
     * Support constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Support $next
     * @return Support
     */
    public function setNext(Support $next)
    {
        $this->next = $next;
        return $next;
    }

    /**
     * @param Trouble $trouble
     */
    public function support(Trouble $trouble)
    {
        if ($this->resolve($trouble)) {
            $this->done($trouble);
            return;
        } elseif ($this->next != null) {
            $this->next->support($trouble);
            return;
        }

        $this->fail($trouble);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[{$this->name}]";
    }

    /**
     * @param Trouble $trouble
     * @return bool
     */
    abstract protected function resolve(Trouble $trouble);

    /**
     * @param Trouble $trouble
     */
    protected function done(Trouble $trouble)
    {
        echo $trouble . " is resolved by " . $this . ".\n";
    }

    /**
     * @param Trouble $trouble
     */
    protected function fail(Trouble $trouble)
    {
        echo $trouble . " cannot be resolved.\n";
    }
}
