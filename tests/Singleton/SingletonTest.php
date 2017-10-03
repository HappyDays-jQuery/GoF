<?php

namespace GoF\Singleton;


use GoF\CommonTestCase;

class SingletonTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testSingleton()
    {
        ob_start();
        $instance1 = Singleton::getInstance();
        $instance2 = Singleton::getInstance();
        $actual = ob_get_clean();
        $this->assertEquals("create instance.", $actual);
        $this->assertEquals($instance1, $instance2);
    }

    public function testTripleton()
    {
        ob_start();
        $instance1 = Tripleton::getInstance(0);
        $actual = ob_get_clean();
        $this->assertEquals("create instance #0.", $actual);

        ob_start();
        $instance2 = Tripleton::getInstance(1);
        $actual = ob_get_clean();
        $this->assertEquals("create instance #1.", $actual);

        ob_start();
        $instance3 = Tripleton::getInstance(2);
        $actual = ob_get_clean();
        $this->assertEquals("create instance #2.", $actual);

        $hash1 = spl_object_hash($instance1);
        $hash2 = spl_object_hash($instance2);
        $hash3 = spl_object_hash($instance3);

        $this->assertNotEquals($hash1, $hash2);
        $this->assertNotEquals($hash1, $hash3);
        $this->assertNotEquals($hash2, $hash3);

        $instance1dash = Tripleton::getInstance(0);

        $this->assertEquals($hash1, spl_object_hash($instance1dash));
    }

    public function testMultiple()
    {
        ob_start();
        $instance1 = Multiple::getInstance('master');
        $actual = ob_get_clean();
        $this->assertEquals("create instance #master.", $actual);

        ob_start();
        $instance2 = Multiple::getInstance('slave');
        $actual = ob_get_clean();
        $this->assertEquals("create instance #slave.", $actual);

        $hash1 = spl_object_hash($instance1);
        $hash2 = spl_object_hash($instance2);

        $this->assertNotEquals($hash1, $hash2);
    }
}
