<?php

namespace GoF\Prototype;

class MessageBox implements Product
{
    /**
     * @var string
     */
    private $decoChar;

    /**
     * MessageBox constructor.
     * @param string $decoChar
     */
    public function __construct($decoChar)
    {
        $this->decoChar = $decoChar;
    }

    /**
     * @param string $str
     * @return void
     */
    public function useProduct($str)
    {
        $length = mb_strwidth($str);
        for ($i = 0; $i < $length + 4; $i++) {
            echo "{$this->decoChar}";
        }
        echo "\n";
        echo "{$this->decoChar} {$str} {$this->decoChar}\n";
        for ($i = 0; $i < $length + 4; $i++) {
            echo "{$this->decoChar}";
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
