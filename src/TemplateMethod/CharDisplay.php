<?php

namespace GoF\TemplateMethod;

class CharDisplay extends AbstractDisplay
{
    /**
     * @var string
     */
    private $char;

    /**
     * CharDisplay constructor.
     * @param string $char
     */
    public function __construct($char)
    {
        $this->char = $char;
    }

    /**
     * @return void
     */
    public function open()
    {
        echo "<<";
    }

    /**
     * @return void
     */
    public function printer()
    {
        echo $this->char;
    }

    /**
     * @return void
     */
    public function close()
    {
        echo ">>\n";
    }
}
