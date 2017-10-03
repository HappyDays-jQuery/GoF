<?php

namespace GoF\Proxy;


use GoF\CommonTestCase;

class ProxyTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testProxy()
    {
        ob_start();
        $p = new PrinterProxy("Alice");
        echo "名前は現在" . $p->getPrinterName() . "です。\n";
        $p->setPrinterName("Bob");
        echo "名前は現在" . $p->getPrinterName() . "です。\n";
        $p->doPrint("Hello, world.");
        $actual = ob_get_clean();
        $expected = <<<__STR__
名前は現在Aliceです。
名前は現在Bobです。
Printerのインスタンス(Bob)を生成中.....完了。
=== Bob ===
Hello, world.

__STR__;
        $this->assertEquals($expected, $actual);
    }
}
