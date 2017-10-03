<?php

namespace GoF\Interpreter;

use GoF\Collection\ArrayList;
use GoF\Exception\ParseException;

class NodeCommandList extends Node
{
    /**
     * @var ArrayList
     */
    private $list;

    /**
     * CommandListNode constructor.
     */
    public function __construct()
    {
        $this->list = new ArrayList();
    }

    /**
     * @param Context $context
     * @throws ParseException
     */
    public function parse(Context $context)
    {
        while (true) {
            if (is_null($context->getCurrentToken())) {
                throw new ParseException("Missing 'end'");
            } elseif ($context->getCurrentToken() == "end") {
                $context->skipToken("end");
                break;
            }

            $commandNode = new NodeCommand();
            $commandNode->parse($context);
            $this->list->add($commandNode);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->list;
    }
}
