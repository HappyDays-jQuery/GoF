<?php

namespace GoF\Command;


use GoF\CommonTestCase;

class CommandTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testComman()
    {
        $queue = new Queue();
        $file = new File("sample.txt");
        $queue->addCommand(new TouchCommand($file));
        $queue->addCommand(new CompressCommand($file));
        $queue->addCommand(new CopyCommand($file));

        ob_start();
        $queue->run();
        $actual = ob_get_clean();
        $expected = <<<__STR__
sample.txtを作成しました
sample.txtを圧縮しました
copy_of_sample.txtを作成しました

__STR__;
        $this->assertEquals($expected, $actual);
    }
}
