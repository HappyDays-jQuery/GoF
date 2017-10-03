<?php

namespace GoF\Command;

interface Command
{
    /**
     * @return void
     */
    public function execute();
}
