<?php

namespace GoF\Interpreter;

/**
 * <command> ::= <repeat command> | <primitive command>
 */
class NodeCommand extends Node
{
    /**
     * @var Node
     */
    private $node;

    /**
     * @param Context $context
     */
    public function parse(Context $context)
    {
        if ($context->getCurrentToken() == "repeat") {
            $this->node = new NodeRepeatCommand();
            $this->node->parse($context);
            return;
        }

        $this->node = new NodePrimitiveCommand();
        $this->node->parse($context);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->node;
    }
}
