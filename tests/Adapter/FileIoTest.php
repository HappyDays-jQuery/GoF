<?php

namespace GoF\Adapter;


use GoF\CommonTestCase;

class FileIoTest extends CommonTestCase
{
    private $filename = PROJECT_DIR . "var/data.txt";
    private $filename_with = PROJECT_DIR . "var/data_with.txt";

    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIo()
    {
        $file = new File();
        touch($this->filename);
        $file->readFromFile($this->filename);
        $file->setValue("Apple", "iPhone");
        $file->setValue("Google", "Android");
        $file->setValue("Git", "Hub");
        $file->setValue("DesignPattern", "Adapter");
        $file->writeToFile($this->filename);
        $file->readFromFile($this->filename);
        $this->assertEquals('Adapter', $file->getValue('DesignPattern'));
        unlink($this->filename);
    }

    public function testIoWithProperties()
    {
        $file = new FileProperties();
        touch($this->filename_with);
        $file->readFromFile($this->filename_with);
        $file->setValue("Apple", "iPhone");
        $file->setValue("Google", "Android");
        $file->setValue("Git", "Hub");
        $file->setValue("DesignPattern", "Adapter");
        $file->writeToFile($this->filename_with);
        $file->readFromFile($this->filename_with);
        $this->assertEquals('Android', $file->getValue('Google'));
        unlink($this->filename_with);
    }
}
