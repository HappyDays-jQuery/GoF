<?php

namespace GoF\Interpreter;

use GoF\Exception\ParseException;

class NodePrimitiveCommand extends Node
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param Context $context
     * @throws ParseException
     * @return void
     */
    public function parse(Context $context)
    {
        $this->name = $context->getCurrentToken();
        $context->skipToken($this->name);
        if (!$this->name == "go" && !$this->name == "right" && !$this->name == "left") {
            throw new ParseException($this->name . " is undefined");
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
