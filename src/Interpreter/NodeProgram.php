<?php

namespace GoF\Interpreter;

class NodeProgram extends Node
{
    /**
     * @var Node
     */
    private $nodeCommandList;

    /**
     * @param Context $context
     * @return void
     */
    public function parse(Context $context)
    {
        $context->skipToken("program");
        $this->nodeCommandList = new NodeCommandList();
        $this->nodeCommandList->parse($context);
    }

    public function __toString()
    {
        return "[program {$this->nodeCommandList}]";
    }
}
