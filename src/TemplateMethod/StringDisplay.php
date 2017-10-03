<?php

namespace GoF\TemplateMethod;

class StringDisplay extends AbstractDisplay
{
    /**
     * @var string
     */
    private $string;
    /**
     * @var int
     */
    private $width;

    /**
     * CharDisplay constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        $this->string = $string;
        $this->width = mb_strwidth($string, 'UTF-8');
    }

    /**
     * @return void
     */
    public function open()
    {
        $this->printLine();
    }

    /**
     * @return void
     */
    public function printer()
    {
        echo "|{$this->string}|\n";
    }

    /**
     * @return void
     */
    public function close()
    {
        $this->printLine();
    }

    private function printLine()
    {
        echo "+";
        for ($i = 0; $i < $this->width; $i++) {
            echo "-";
        }
        echo "+\n";
    }
}
