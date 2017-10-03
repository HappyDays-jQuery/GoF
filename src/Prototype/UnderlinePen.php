<?php

namespace GoF\Prototype;

class UnderlinePen implements Product
{
    /**
     * @var string
     */
    private $ulChar;

    /**
     * MessageBox constructor.
     * @param string $ulChar
     */
    public function __construct($ulChar)
    {
        $this->ulChar = $ulChar;
    }

    /**
     * @param string $str
     * @return void
     */
    public function useProduct($str)
    {
        $length = mb_strwidth($str);
        echo "{$str}\n";
        for ($i = 0; $i < $length; $i++) {
            echo "{$this->ulChar}";
        }
        echo "\n";
    }

    /**
     * @return Product
     */
    public function createClone()
    {
        return clone $this;
    }
}
