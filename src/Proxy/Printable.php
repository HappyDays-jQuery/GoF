<?php

namespace GoF\Proxy;

interface Printable
{
    /**
     * @param String $name
     * @return void
     */
    public function setPrinterName($name);

    /**
     * @return string
     */
    public function getPrinterName();

    /**
     * @param string $string
     * @return void
     */
    public function doPrint($string);
}
