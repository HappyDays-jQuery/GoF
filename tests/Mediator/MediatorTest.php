<?php

namespace GoF\Mediator;

use GoF\CommonTestCase;

class MediatorTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testChatRoom()
    {
        $chatRoom = new ChatRoom();

        $alice = new User('alice');
        $bob = new User('bob');
        $charie = new User('charie');
        $diana = new User('diana');
        $elmo = new User('elmo');

        $expected = <<< __EOL__
aliceさんが入室しました
bobさんが入室しました
charieさんが入室しました
dianaさんが入室しました
elmoさんが入室しました
aliceさんからbobさんへ： 来週の予定は？
bobさんからaliceさんへ： 秘密です
fredさんは入室していないようです
dianaさんからcharieさんへ： お邪魔してます
elmoさんからdianaさんへ： 私事で恐縮ですが…

__EOL__;

        ob_start();
        $chatRoom->createColleagues($alice);
        $chatRoom->createColleagues($bob);
        $chatRoom->createColleagues($charie);
        $chatRoom->createColleagues($diana);
        $chatRoom->createColleagues($elmo);

        $alice->sendMessage('bob', '来週の予定は？') ;
        $bob->sendMessage('alice', '秘密です') ;
        $charie->sendMessage('fred', '元気ですか？') ;
        $diana->sendMessage('charie', 'お邪魔してます') ;
        $elmo->sendMessage('diana', '私事で恐縮ですが…');
        $actual = ob_get_clean();

        $this->assertEquals($expected, $actual);
    }
}
