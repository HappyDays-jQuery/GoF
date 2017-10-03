<?php

namespace GoF\AbstractFactory\TableFactory;

use GoF\AbstractFactory\Factory\Tray;

class TableTray extends Tray
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
<td>
  <table>
    <caption>{$this->caption}</caption>
    <tr>
      {$contents}    
    </tr>
  </table>
</td>
__EOL__;
    }
}
