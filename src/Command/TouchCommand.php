<?php

namespace GoF\Command;

/**
 * ConcreteCommandクラスに相当する
 */
class TouchCommand implements Command
{
    /**
     * @var File
     */
    private $file;

    /**
     * TouchCommand constructor.
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
        $this->file->create();
    }
}
