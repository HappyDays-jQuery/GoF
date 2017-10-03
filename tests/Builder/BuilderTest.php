<?php

namespace GoF\Builder;

use GoF\CommonTestCase;

class BuilderTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testBuilder()
    {
        $director = new Director(new TextBuilder());
        ob_start();
        $director->construct();
        $actual = ob_get_clean();
        $expected = <<< __EOL__
==============================
Greeting

■ 朝から昼にかけて

　・おはようございます。
　・こんにちは。

■ 夜に

　・こんばんは。
　・おやすみなさい。
　・さようなら。

==============================

__EOL__;
        $this->assertEquals($expected, $actual);

        $director = new Director(new HtmlBuilder());
        ob_start();
        $director->construct();
        $actual = ob_get_clean();
        $expected = <<< __EOL__
<html><head><title>Greeting</title></head><body><h1>Greeting</h1><p>朝から昼にかけて</p><ul><li>おはようございます。</li><li>こんにちは。</li></ul><p>夜に</p><ul><li>こんばんは。</li><li>おやすみなさい。</li><li>さようなら。</li></ul></body></html>
__EOL__;
        $this->assertEquals($expected, $actual);


    }
}
