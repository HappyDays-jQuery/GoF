<?php

namespace GoF\ChainOfResponsibility;

class NoSupport extends Support
{
    /**
     * NoSupport constructor.
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
        return false;
    }
}
