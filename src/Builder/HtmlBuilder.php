<?php

namespace GoF\Builder;

class HtmlBuilder implements Builder
{
    /**
     * @param string $title
     * @return void
     */
    public function makeTitle($title)
    {
        echo "<html><head><title>{$title}</title></head><body>";
        echo "<h1>{$title}</h1>";
    }

    /**
     * @param string $str
     * @return void
     */
    public function makeString($str)
    {
        echo "<p>{$str}</p>";
    }

    /**
     * @param array $items
     * @return void
     */
    public function makeItems($items)
    {
        echo "<ul>";
        foreach ($items as $item) {
            echo "<li>{$item}</li>";
        }
        echo "</ul>";
    }

    /**
     * @return void
     */
    public function close()
    {
        echo "</body></html>";
    }
}
