<?php

namespace GoF\AbstractFactory;


use GoF\AbstractFactory\Factory\Factory;
use GoF\CommonTestCase;

class AbstractFactoryTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testListFactory()
    {
        $factory = Factory::getFactory('\GoF\AbstractFactory\ListFactory\ListFactory');

        $asahi = $factory->createLink("朝日新聞", "http://www.asahi.com/");
        $yomiuri = $factory->createLink("読売新聞", "http://www.yomiuri.co.jp/");
        $usYahoo = $factory->createLink("Yahoo!", "http://www.yahoo.com/");
        $jpYahoo = $factory->createLink("Yahoo!Japan", "http://www.yahoo.co.jp/");
        $excite = $factory->createLink("Excite", "http://www.excite.com/");
        $google = $factory->createLink("Google", "http://www.google.com/");

        $trayNews = $factory->createTray("新聞");
        $trayNews->add($asahi);
        $trayNews->add($yomiuri);

        $trayYahoo = $factory->createTray("Yahoo!");
        $trayYahoo->add($usYahoo);
        $trayYahoo->add($jpYahoo);

        $traySearch = $factory->createTray("サーチエンジン");
        $traySearch->add($trayYahoo);
        $traySearch->add($excite);
        $traySearch->add($google);

        $page = $factory->createPage("LinkPage", "hoge@fuga");

        $page->add($trayNews);
        $page->add($traySearch);

        $expected = <<<__EOL__
<html>
  <head>
    <title>LinkPage</title>
  </head>
  <body>
    <h1>LinkPage</h1>
    <ul>
      <li>新聞
  <ul>
      <li><a href="http://www.asahi.com/">朝日新聞</a></li>
  <li><a href="http://www.yomiuri.co.jp/">読売新聞</a></li>

  </ul>
</li><li>サーチエンジン
  <ul>
    <li>Yahoo!
  <ul>
      <li><a href="http://www.yahoo.com/">Yahoo!</a></li>
  <li><a href="http://www.yahoo.co.jp/">Yahoo!Japan</a></li>

  </ul>
</li>  <li><a href="http://www.excite.com/">Excite</a></li>
  <li><a href="http://www.google.com/">Google</a></li>

  </ul>
</li>
    </ul>
    <hr>
    <address>hoge@fuga</address>
  </body>
</html>
__EOL__;

        $this->assertEquals($expected, $page->makeHTML());
    }

    public function testTableFactory()
    {
        $factory = Factory::getFactory('\GoF\AbstractFactory\TableFactory\TableFactory');

        $asahi = $factory->createLink("朝日新聞", "http://www.asahi.com/");
        $yomiuri = $factory->createLink("読売新聞", "http://www.yomiuri.co.jp/");
        $usYahoo = $factory->createLink("Yahoo!", "http://www.yahoo.com/");
        $jpYahoo = $factory->createLink("Yahoo!Japan", "http://www.yahoo.co.jp/");
        $excite = $factory->createLink("Excite", "http://www.excite.com/");
        $google = $factory->createLink("Google", "http://www.google.com/");

        $trayNews = $factory->createTray("新聞");
        $trayNews->add($asahi);
        $trayNews->add($yomiuri);

        $trayYahoo = $factory->createTray("Yahoo!");
        $trayYahoo->add($usYahoo);
        $trayYahoo->add($jpYahoo);

        $traySearch = $factory->createTray("サーチエンジン");
        $traySearch->add($trayYahoo);
        $traySearch->add($excite);
        $traySearch->add($google);

        $page = $factory->createPage("LinkPage", "hoge@fuga");

        $page->add($trayNews);
        $page->add($traySearch);

        $expected = <<<__EOL__
<html>
  <head>
    <title>LinkPage</title>
  </head>
  <body>
    <h1>LinkPage</h1>
    <table>
      <tr><td>
  <table>
    <caption>新聞</caption>
    <tr>
        <td><a href="http://www.asahi.com/">朝日新聞</a></td>
  <td><a href="http://www.yomiuri.co.jp/">読売新聞</a></td>
    
    </tr>
  </table>
</td></tr>
<tr><td>
  <table>
    <caption>サーチエンジン</caption>
    <tr>
      <td>
  <table>
    <caption>Yahoo!</caption>
    <tr>
        <td><a href="http://www.yahoo.com/">Yahoo!</a></td>
  <td><a href="http://www.yahoo.co.jp/">Yahoo!Japan</a></td>
    
    </tr>
  </table>
</td>  <td><a href="http://www.excite.com/">Excite</a></td>
  <td><a href="http://www.google.com/">Google</a></td>
    
    </tr>
  </table>
</td></tr>

    </table>
    <hr>
    <address>hoge@fuga</address>
  </body>
</html>
__EOL__;

        $this->assertEquals($expected, $page->makeHTML());
    }
}
