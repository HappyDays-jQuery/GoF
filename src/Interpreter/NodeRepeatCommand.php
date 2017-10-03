<?php

namespace GoF\Interpreter;

use GoF\Exception\ParseException;

class NodeRepeatCommand extends Node
{
    /**
     * @var int
     */
    private $number;
    /**
     * @var Node
     */
    private $commandListNode;

    /**
     * @param Context $context
     * @throws ParseException
     * @return void
     */
    public function parse(Context $context)
    {
        $context->skipToken("repeat");
        $this->number = $context->currentNumber();
        $context->nextToken();
        $this->commandListNode = new NodeCommandList();
        $this->commandListNode->parse($context);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[repeat " . $this->number . " " . $this->commandListNode . "]";
    }
}
