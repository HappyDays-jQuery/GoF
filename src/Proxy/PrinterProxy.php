<?php

namespace GoF\Proxy;

class PrinterProxy implements Printable
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Printer
     */
    private $real;

    /**
     * PrinterProxy constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setPrinterName($name)
    {
        if ($this->real != null) {
            $this->real->setPrinterName($name);
        }

        $this->name = $name;
    }

    public function getPrinterName()
    {
        return $this->name;
    }

    /**
     * @param string $string
     */
    public function doPrint($string)
    {
        $this->realize();
        $this->real->doPrint($string);
    }

    /**
     * @return void
     */
    private function realize()
    {
        if ($this->real == null) {
            $this->real = new Printer($this->name);
        }
    }
}
