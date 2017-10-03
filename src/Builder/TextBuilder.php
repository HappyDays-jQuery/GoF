<?php

namespace GoF\Builder;

class TextBuilder implements Builder
{
    /**
     * @param string $title
     * @return void
     */
    public function makeTitle($title)
    {
        echo "==============================\n";
        echo "{$title}\n\n";
    }

    /**
     * @param string $str
     * @return void
     */
    public function makeString($str)
    {
        echo "■ {$str}\n\n";
    }

    /**
     * @param array $items
     * @return void
     */
    public function makeItems($items)
    {
        foreach ($items as $item) {
            echo "　・{$item}\n";
        }
        echo "\n";
    }

    /**
     * @return void
     */
    public function close()
    {
        echo "==============================\n";
    }
}
