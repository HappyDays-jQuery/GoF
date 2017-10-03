<?php

namespace GoF\AbstractFactory\ListFactory;

use GoF\AbstractFactory\Factory\Tray;

class ListTray extends Tray
{
    /**
     * ListTray constructor.
     * @param string $caption
     */
    public function __construct($caption)
    {
        parent::__construct($caption);
    }

    /**
     * @return string
     */
    public function makeHtml()
    {
        $contents = "";
        $it = $this->tray->iterator();
        while ($it->valid()) {
            $item = $it->current();
            $contents .= $item->makeHtml();
            $it->next();
        }

        return <<< __EOL__
<li>{$this->caption}
  <ul>
    {$contents}
  </ul>
</li>
__EOL__;
    }
}
