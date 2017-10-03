<?php

namespace GoF\Visitor;

class ListVisitor extends Visitor
{

    private $currentDir = "";

    /**
     * ダブルディスパッチャ
     *
     * @param Entry $entry
     * @return void
     */
    public function visit(Entry $entry)
    {
        if ($entry->isFile()) {
            $this->visitFile($entry);
            return;
        }

        $this->visitDirectory($entry);
    }

    /**
     * @param Entry $entry
     */
    private function visitFile(Entry $entry)
    {
        echo $this->currentDir . "/" . $entry . "\n";
    }

    /**
     * @param Entry $entry
     */
    private function visitDirectory(Entry $entry)
    {
        /**
         * @var Directory $entry
         */
        echo $this->currentDir . "/" . $entry . "\n";
        $saveDir = $this->currentDir;
        $this->currentDir = $this->currentDir . "/" . $entry->getName();
        $it = $entry->getDirectory()->iterator();
        while ($it->valid()) {
            $entry = $it->current();
            $entry->accept($this);
            $it->next();
        }
        $this->currentDir = $saveDir;
    }
}
