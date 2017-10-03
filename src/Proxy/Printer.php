<?php

namespace GoF\Proxy;

class Printer implements Printable
{

    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->heavyJob("Printerのインスタンス({$this->name})を生成中");
    }

    public function setPrinterName($name)
    {
        $this->name = $name;
    }

    public function getPrinterName()
    {
        return $this->name;
    }

    public function doPrint($string)
    {
        echo "=== {$this->name} ===\n";
        echo "$string\n";
    }

    /**
     * @param string $msg
     */
    private function heavyJob($msg)
    {
        echo $msg;
        for ($i = 0; $i < 5; $i++) {
            echo ".";
        }
        echo "完了。\n";
    }
}
