<?php

namespace GoF\Decorator;

class FullBorder extends Border
{

    /**
     * FullBorder constructor.
     * @param Display $display
     */
    public function __construct(Display $display)
    {
        parent::__construct($display);
    }

    /**
     * @return int
     */
    public function getColumns()
    {
        return 1 + $this->display->getColumns() + 1;
    }

    /**
     * @return int
     */
    public function getRows()
    {
        return 1 + $this->display->getRows() + 1;
    }

    /**
     * @param int $row
     * @return string
     */
    public function getRowText($row)
    {
        if ($row == 0) {
            return "+" . $this->makeLine('-', $this->display->getColumns()) . "+";
        }
        if ($row == $this->display->getRows() + 1) {
            return "+" . $this->makeLine('-', $this->display->getColumns()) . "+";
        }

        return "|" . $this->display->getRowText($row - 1) . "|";
    }


    /**
     * @param string $ch
     * @param int    $count
     * @return string
     */
    private function makeLine($ch, $count)
    {
        $ret = '';
        for ($i = 0; $i < $count; $i++) {
            $ret .= $ch;
        }

        return $ret;
    }
}
