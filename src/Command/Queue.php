<?php

namespace GoF\Command;

use GoF\Collection\ArrayList;

/**
 * Invokerクラスに相当する
 */
class Queue
{
    /**
     * @var ArrayList
     */
    private $commands;

    /**
     * Queue constructor.
     */
    public function __construct()
    {
        $this->commands = new ArrayList();
    }

    /**
     * @param Command $command
     */
    public function addCommand(Command $command)
    {
        $this->commands->add($command);
    }

    public function run()
    {
        $it = $this->commands->iterator();
        while ($it->valid()) {
            $command = $it->current();
            $command->execute();
            $it->next();
        }
    }
}
