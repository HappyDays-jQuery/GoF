<?php

namespace GoF\Bridge;

class StringDisplayImpl extends DisplayImpl
{
    /**
     * @var string
     */
    private $str;
    /**
     * @var int
     */
    private $width;

    /**
     * StringDisplayImpl constructor.
     * @param string $str
     */
    public function __construct($str)
    {
        $this->str = $str;
        $this->width = mb_strwidth($str);
    }

    /**
     * @return void
     */
    public function rawOpen()
    {
        $this->printLine();
    }

    /**
     * @return void
     */
    public function rawPrint()
    {
        echo "|{$this->str}|\n";
    }

    /**
     * @return void
     */
    public function rawClose()
    {
        $this->printLine();
    }

    /**
     * @return void
     */
    private function printLine()
    {
        echo "+";
        for ($i = 0; $i < $this->width; $i++) {
            echo "-";
        }
        echo "+\n";
    }
}
