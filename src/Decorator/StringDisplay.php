<?php

namespace GoF\Decorator;

class StringDisplay extends Display
{
    /**
     * @var string
     */
    private $string;

    /**
     * StringDisplay constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * @return int
     */
    public function getColumns()
    {
        return mb_strwidth($this->string);
    }

    /**
     * @return int
     */
    public function getRows()
    {
        return 1;
    }

    /**
     * @param int $row
     * @return string
     */
    public function getRowText($row)
    {
        return $row == 0 ? $this->string : '';
    }
}
