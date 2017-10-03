<?php

namespace GoF\Command;

/**
 * ConcreteCommandクラスに相当する
 */
class CompressCommand implements Command
{
    /**
     * @var File
     */
    private $file;

    /**
     * CompressCommand constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $this->file->compress();
    }
}
