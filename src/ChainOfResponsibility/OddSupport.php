<?php

namespace GoF\ChainOfResponsibility;

class OddSupport extends Support
{
    /**
     * OddSupport constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * @param Trouble $trouble
     * @return bool
     */
    protected function resolve(Trouble $trouble)
    {
        return $trouble->getNumber() % 2 == 1;
    }
}
