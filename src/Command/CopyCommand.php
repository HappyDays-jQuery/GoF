<?php

namespace GoF\Command;

/**
 * ConcreteCommandクラスに相当する
 */
class CopyCommand implements Command
{
    /**
     * @var File
     */
    private $file;

    /**
     * CopyCommand constructor.
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
        $file = new File('copy_of_' . $this->file->getName());
        $file->create();
    }
}
