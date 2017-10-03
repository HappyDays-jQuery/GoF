<?php

namespace GoF\Visitor;

use GoF\CommonTestCase;

class VisitorTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testVisitor()
    {
        $rootDir = new Directory("root");
        $binDir = new Directory("bin");
        $tmpDir = new Directory("tmp");
        $usrDir = new Directory("usr");

        $rootDir->add($binDir);
        $rootDir->add($tmpDir);
        $rootDir->add($usrDir);

        $binDir->add(new File("vi", 10000));
        $binDir->add(new File("latex", 20000));

        $yuki = new Directory("yuki");
        $hanako = new Directory("hanako");
        $tomura = new Directory("tomura");

        $usrDir->add($yuki);
        $usrDir->add($hanako);
        $usrDir->add($tomura);
        $yuki->add(new File("diary.html", 100));
        $yuki->add(new File("Visitor.html", 200));
        $hanako->add(new File("memo.txt", 300));
        $tomura->add(new File("game.doc", 400));
        $tomura->add(new File("jank.mail", 500));

        ob_start();
        $rootDir->accept(new ListVisitor());
        $actual = ob_get_clean();
        $expected = <<< __EOL__
/root (31500)
/root/bin (30000)
/root/bin/vi (10000)
/root/bin/latex (20000)
/root/tmp (0)
/root/usr (1500)
/root/usr/yuki (300)
/root/usr/yuki/diary.html (100)
/root/usr/yuki/Visitor.html (200)
/root/usr/hanako (300)
/root/usr/hanako/memo.txt (300)
/root/usr/tomura (900)
/root/usr/tomura/game.doc (400)
/root/usr/tomura/jank.mail (500)

__EOL__;

        $this->assertEquals($expected, $actual);
    }
}
