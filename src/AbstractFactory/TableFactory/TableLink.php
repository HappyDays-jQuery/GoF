<?php

namespace GoF\AbstractFactory\TableFactory;

use GoF\AbstractFactory\Factory\Link;

class TableLink extends Link
{
    /**
     * ListLink constructor.
     * @param string $caption
     * @param string $url
     */
    public function __construct($caption, $url)
    {
        parent::__construct($caption, $url);
    }

    /**
     * @return string
     */
    public function makeHtml()
    {
        return "  <td><a href=\"{$this->url}\">{$this->caption}</a></td>\n";
    }
}
