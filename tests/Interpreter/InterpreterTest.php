<?php

namespace GoF\Interpreter;


use GoF\Collection\ArrayList;
use GoF\CommonTestCase;

class InterpreterTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testInterpreter()
    {
        $expected = <<<__EOL__
text = program end
node = [program ]
text = program go end
node = [program go]
text = program go right go right go right go right end
node = [program go,right,go,right,go,right,go,right]
text = program repeat 4 go right end end
node = [program [repeat 4 go,right]]
text = program repeat 4 repeat 3 go right go left end right end end
node = [program [repeat 4 [repeat 3 go,right,go,left],right]]

__EOL__;

        $arrList = new ArrayList(file(PROJECT_DIR . "tests/Interpreter/program.txt", FILE_IGNORE_NEW_LINES));
        $it = $arrList->iterator();

        ob_start();
        while ($it->valid()) {
            echo "text = {$it->current()}\n";
            $node = new NodeProgram();
            $node->parse(new Context($it->current()));
            echo "node = {$node}\n";
            $it->next();
        }
        $actual = ob_get_clean();
        $this->assertContains($expected, $actual);
    }
}
